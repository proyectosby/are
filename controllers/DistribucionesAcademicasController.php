<?php

namespace app\controllers;

use Yii;
use app\models\DistribucionesAcademicas;
use app\models\DistribucionesAcademicasBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\web\Response;

use app\models\Estados;
use app\models\DistribucionesXBloquesXDias;
use yii\data\SqlDataProvider;



/**
 * DistribucionesAcademicasController implements the CRUD actions for DistribucionesAcademicas model.
 */
class DistribucionesAcademicasController extends Controller
{
    
	
	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	
	
	
	
	

    /**
     * Lists all DistribucionesAcademicas models.
     * @return mixed
     */
    public function actionIndex($idInstitucion = 0, $idSedes = 0)
    {
        // Si existe id sedes e institución se muestra la listas de todas las jornadas correspondientes
		if( $idInstitucion != 0 && $idSedes != 0 )
		{
			
			$searchModel = new DistribucionesAcademicasBuscar();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams); //traer los datos de la distribucion academica por sede
			$dataProvider->query->select ("da.id, da.id_asignaturas_x_niveles_sedes, da.id_perfiles_x_personas_docentes, da.id_aulas_x_sedes, da.fecha_ingreso, da.estado, da.id_paralelo_sede");
			$dataProvider->query->from( 'distribuciones_academicas as da, asignaturas_x_niveles_sedes as ans, sedes_niveles as sn');
			$dataProvider->query->andwhere( "da.id_asignaturas_x_niveles_sedes = ans.id
											AND sn.id = ans.id_sedes_niveles
											AND sn.id_sedes = $idSedes
											AND da.estado = 1");
		
			// echo "<pre>"; print_r($dataProvider); echo "</pre>";
			return $this->render('index', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
				'idSedes' 	=> $idSedes,
				'idInstitucion' => $idInstitucion,
			]);
		}
		else
		{
			// Si el id de institucion o de sedes es 0 se llama a la vista listarInstituciones
			 return $this->render('listarInstituciones',[
				'idSedes' 		=> $idSedes,
				'idInstitucion' => $idInstitucion,
			] );
		}
    }

    /**
     * Displays a single DistribucionesAcademicas model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        
		/**
		* Se trae el id de sede desde el aula
		*/
		//variable con la conexion a la base y traer id sede
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("select s.id
											  from aulas as a, sedes as s, distribuciones_academicas as da
											  where da.id_aulas_x_sedes = a.id
											  and a.id_sedes = s.id
											  and a.estado = 1
											  and s.estado = 1
											  group by s.id");
		$idSedes = $command->queryAll();
		$idSedes = $idSedes[0]['id'];
		// /**
		// * Se trae el id de institucion desde sede
		// */
		$command = $connection->createCommand(" select i.id
												  from sedes as s, instituciones as i
												  where s.id_instituciones = i.id
												  and s.estado = 1
												  and i.estado = 1
												  and s.id = $idSedes");
		$idInstitucion = $command->queryAll();
		$idInstitucion = $idInstitucion[0]['id'];
		
		return $this->render('view', [
            'model' => $this->findModel($id),
			'idSedes' 		=> $idSedes,
			'idInstitucion' => $idInstitucion,
        ]);
    }

    /**
     * Creates a new DistribucionesAcademicas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idSedes, $idInstitucion)
    {	
	
	//se usa en el form para que en el yii se activen los dataTables
		$sql ="
		SELECT p.identificacion
		FROM personas as p
			 
		   ";		
		$dataProvider = new SqlDataProvider([
				'sql' => $sql,
				
			]);
						
        //se crea una instancia del modelo estados
		$estadosTable 		 	= new Estados();
		//se traen los datos de estados
		$dataestados		 	= $estadosTable->find()->where( 'id=1' )->all();
		//se guardan los datos en un array
		$estados	 	 	 	= ArrayHelper::map( $dataestados, 'id', 'descripcion' );
		
		/**
		* Concexion a la db, llenar select de docentes
		*/
		//variable con la conexion a la base de datos  pe.id=10 es el perfil docente
		$connection = Yii::$app->getDb();
		
		$command = $connection->createCommand("select d.id_perfiles_x_personas as id, concat(p.nombres,' ',p.apellidos) as nombres
												from personas as p, perfiles_x_personas as pp, docentes as d, perfiles as pe
												where p.id= pp.id_personas
												and p.estado=1
												and pp.id_perfiles=pe.id
												and pe.id=10
												and pe.estado=1
												and pp.id= d.id_perfiles_x_personas");
		$result = $command->queryAll();
		//se formatea para que lo reconozca el select
		foreach($result as $key){
			$docentes[$key['id']]=$key['nombres'];
		}
		
		/**
		* Llenar select de aulas por sede
		*/
		$command = $connection->createCommand("SELECT a.id, a.descripcion
												FROM aulas as a, sedes as s
												WHERE a.id_sedes = s.id
												AND a.id_sedes = $idSedes");
		$result = $command->queryAll();
		//se formatea para que lo reconozca el select
		foreach($result as $key){
			$aulas[$key['id']]=$key['descripcion'];
		}
		
		// /**
		// * Llenar select de paralelo(grupo) por sede y nivel seleccionado
		// */
		
		// $command = $connection->createCommand("SELECT p.id, p.descripcion
												// FROM paralelos as p, sedes_niveles as sn
												// WHERE sn.id = p.id_sedes_niveles
												// AND sn.id_sedes = $idSedes
												// and p.id_sedes_niveles = ".$idSedesNiveles."");
		// $result = $command->queryAll();
		// //se formatea para que lo reconozca el select
		// foreach($result as $key){
			// $grupos[$key['id']]=$key['descripcion'];
		// }

		$modificar = false;
		
		$model = new DistribucionesAcademicas();
			
			// echo "<pre>"; print_r( ); echo "</pre>";
			// echo "<pre>"; print_r( Yii::$app->request->post()); echo "</pre>";
			// die;
		
		
		if($_POST)
		{		
	
			$id_asignaturas_x_niveles_sedes	= $_POST['id_asignaturas_x_niveles_sedes'];
			$id_perfiles_x_personas_docentes= $_POST['id_perfiles_x_personas_docentes'];
			$id_aulas_x_sedes				= $_POST['id_aulas_x_sedes'];
			$estado							= $_POST['id_aulas_x_sedes'];
			$id_paralelo_sede				= $_POST['id_paralelo_sede'];
			$fecha_ingreso					= $_POST['fecha_ingreso'];
			$dia 							= $_POST['dia'];
			$bloque 						= $_POST['bloque'];
			
			$connection = Yii::$app->getDb();
			//id del dia del la celda que seleciona en el dataTable
			$command 	= $connection->createCommand("SELECT id FROM dias WHERE descripcion ='$dia'");
			$result 	= $command->queryAll();
			$idDia 		= $result[0]['id'];
			
			//id del bloque del la celda que seleciona en el dataTable
			$command 	= $connection->createCommand("SELECT sb.id 
													FROM sedes_x_bloques as sb, bloques as b
													WHERE sb.id_bloques = b.id
													and b.descripcion ='$bloque'
													and sb.id_sedes=$idSedes");
			$result 	= $command->queryAll();
			$idBloqueXSede	= $result[0]['id'];
			
			if(strpos($_POST['informacionCelda'],"</insertar>") > 0)
			{
				$connection = Yii::$app->getDb();
			
				//insertar en distribuciones_academicas y retornar el id 
				$command = $connection->createCommand
				("
					INSERT INTO public.distribuciones_academicas
					(
						id_asignaturas_x_niveles_sedes,
						id_perfiles_x_personas_docentes,
						id_aulas_x_sedes,
						fecha_ingreso,
						estado,
						id_paralelo_sede
					)
					VALUES 
					(
						$id_asignaturas_x_niveles_sedes,
						$id_perfiles_x_personas_docentes,
						$id_aulas_x_sedes,
						'$fecha_ingreso',
						1,
						$id_paralelo_sede
						
					) RETURNING id;
				");
				$result = $command->queryAll();
				$id = $result[0]['id'];
				
				
				//insertar en distribuciones_x_bloques_x_dias
				$command = $connection->createCommand
				("
					INSERT INTO public.distribuciones_x_bloques_x_dias
					(
						id_distribuciones_academicas,
						id_bloques_sedes,
						id_dias
					)
					VALUES 
					(
						$id,
						$idBloqueXSede,
						$idDia
					)
				");
				$result = $command->queryAll();
				
				$data = array("mensaje"=>"hola");
					
				echo json_encode($data);
				die;
				
			}
			elseif(strpos($_POST['informacionCelda'],"</actualizar=") > 0)
			{
				$pos = strpos($_POST['informacionCelda'],"</actualizar=");
				//id de la distribucion academica
				$id= substr($_POST['informacionCelda'],$pos+13);
				//actualiza la distribucion academica
				$command = $connection->createCommand
				("
					UPDATE public.distribuciones_academicas
					SET id_asignaturas_x_niveles_sedes=$id_asignaturas_x_niveles_sedes,
					id_perfiles_x_personas_docentes=$id_perfiles_x_personas_docentes,
					id_aulas_x_sedes=$id_aulas_x_sedes,
					fecha_ingreso='$fecha_ingreso',
					estado=1,
					id_paralelo_sede=$id_paralelo_sede				
					WHERE id=$id;
				");
				$result = $command->queryAll();
				
				//actualiza distribuciones_x_bloques_x_dias
				$command = $connection->createCommand
				("
					UPDATE public.distribuciones_x_bloques_x_dias
					SET id_bloques_sedes=$idBloqueXSede,
					id_dias=$idDia
					WHERE id_distribuciones_academicas=$id;	
				");
				$result = $command->queryAll();
				$data = array("mensaje"=>"hola");
				echo json_encode($data);
				die;
			}
			// return $this->redirect(['view', 'id' => $model->id]);
		}
		
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'idSedes' => $idSedes,
			'estados'=>$estados,
			'docentes'=>$docentes,
			'aulas'=>$aulas,
			'paralelos_distribucion'=>'',
			'modificar'=>$modificar,
			'niveles_sede'=>'',
			'asignaturas_distribucion'=>'',
			'idInstitucion'=>$idInstitucion,
			'paralelos_distribucion'=>'',
			'dataProvider'=>$dataProvider,
			
        ]);
    }

    /**
     * Updates an existing DistribucionesAcademicas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		
		$sql ="
		SELECT p.identificacion
		FROM personas as p
			 
		   ";		
		$dataProvider = new SqlDataProvider([
				'sql' => $sql,
				
			]);
		
        //se crea una instancia del modelo estados
		$estadosTable 		 	= new Estados();
		//se traen los datos de estadosCiviles
		$dataestados		 	= $estadosTable->find()->all();
		//se guardan los datos en un array
		$estados	 	 	 	= ArrayHelper::map( $dataestados, 'id', 'descripcion' );
		
		/**
		* Se trae el id de sede desde el aula
		*/
		//variable con la conexion a la base y traer id sede
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("select s.id as idsedes, s.id_instituciones as idinstitucion
											  from aulas as a, sedes as s, distribuciones_academicas as da
											  where da.id_aulas_x_sedes = a.id
											  and a.id_sedes = s.id
											  and a.estado = 1
											  and s.estado = 1
											  and da.id=$id
											  group by s.id"
											  );
		$idSedes = $command->queryAll();
		$idSedes1 = $idSedes[0]['idsedes'];
		$idInstitucion = $idSedes[0]['idinstitucion'];
		
		
		/**
		* Concexion a la db, llenar select de docentes
		*/
		//variable con la conexion a la base de datos  pe.id=10 es el perfil docente
		
		
		$command = $connection->createCommand("select d.id_perfiles_x_personas as id, concat(p.nombres,' ',p.apellidos) as nombres
												from personas as p, perfiles_x_personas as pp, docentes as d, perfiles as pe, perfiles_x_personas_institucion as ppi
												where p.id= pp.id_personas
												and p.estado=1
												and pp.id_perfiles=pe.id
												and pe.id=10
												and pe.estado=1
												and pp.id= d.id_perfiles_x_personas
												and ppi.id_institucion = $idInstitucion
												and pp.id = ppi.id_perfiles_x_persona
												");
		$result = $command->queryAll();
		//se formatea para que lo reconozca el select
		foreach($result as $key){
			$docentes[$key['id']]=$key['nombres'];
		}
		
		
		/**
		* Llenar select de aulas por sede
		*/
		$command = $connection->createCommand("SELECT a.id, a.descripcion
												FROM aulas as a, sedes as s
												WHERE a.id_sedes = s.id
												AND a.id_sedes = $idSedes1");
		$result = $command->queryAll();
		//se formatea para que lo reconozca el select
		foreach($result as $key){
			$aulas[$key['id']]=$key['descripcion'];
		}
		
		$model = $this->findModel($id);
		/**
		* Traer de id_asignaturas_x_niveles_sedes con id de distribuciones academicas
		*/
		// $command = $connection->createCommand("select da.id_asignaturas_x_niveles_sedes
												// from distribuciones_academicas as da
												// where da.id = $id");
		// $result = $command->queryAll();
		// $id_asignaturas_x_niveles_sedes = $result[0]['id_asignaturas_x_niveles_sedes'];
		$id_asignaturas_x_niveles_sedes = $model->id_asignaturas_x_niveles_sedes;
		
		
		/**
		* Traer de los niveles de esa sede 
		*/
		$command = $connection->createCommand("SELECT sn.id, n.descripcion
												FROM public.sedes_niveles as sn, niveles as n, asignaturas_x_niveles_sedes as ans
												where sn.id_sedes = $idSedes1
												and sn.id_niveles = n.id
												and n.estado = 1
												
												group by sn.id, n.descripcion
												");
		$result = $command->queryAll();
		
		foreach ($result as $r)
		{
			$niveles_sede[$r['id']]=$r['descripcion'];
			
		}
		// $niveles_sede = $result[0]['id'];  //ya se tiene el valor del nivel que se selecciono 26 septimo
		
		
		/**
		* Traer de las asignaturas ya guardada en la asignaturas por niveles sedes 
		*/
		
		
										
		
		$command = $connection->createCommand("SELECT ans.id, a.descripcion
												FROM asignaturas_x_niveles_sedes as ans, asignaturas as a, sedes_niveles as sn
												WHERE a.estado = 1
												AND a.id = ans.id_asignaturas
												AND ans.id_sedes_niveles = sn.id
												and ans.id = $id_asignaturas_x_niveles_sedes");
		$result = $command->queryAll();
		$asignaturas_distribucion = $result[0]['id']; 
		
			/**
		* Traer el nivel que esta seleccionado 
		*/
		
		$command = $connection->createCommand("
			SELECT sn.id
			FROM distribuciones_academicas as da, asignaturas_x_niveles_sedes as ans, sedes_niveles as sn
			where da.id_asignaturas_x_niveles_sedes = ans.id
			and ans.id_sedes_niveles = sn.id
			and da.id=$id");
		$result = $command->queryAll();
		$nivelSelected = $result[0]['id']; 
		
		/**
		* Traer paralelo(grupo) guardado por sede por nivel
		*/
		$command = $connection->createCommand("select da.id_paralelo_sede
												from distribuciones_academicas as da
												where da.id = $id"); //idSedesNiveles
		$result = $command->queryAll();
		$paralelos_distribucion = $result[0]['id_paralelo_sede']; 
		$modificar = true;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
			
            'model' => $model,
			'estados'=>$estados,
			'idSedes' => $idSedes1,
			'idInstitucion' => $idInstitucion,
			'docentes'=>$docentes,
			'aulas'=>$aulas,
			'paralelos_distribucion'=>$paralelos_distribucion,
			'niveles_sede'=>$niveles_sede, //todos
			'asignaturas_distribucion'=>$asignaturas_distribucion,
			'modificar'=>$modificar,
			'dataProvider'=>$dataProvider,
			'nivelSelected'=>$nivelSelected,
        ]);
    }

    /**
     * Deletes an existing DistribucionesAcademicas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();

		// /**
		// * Se trae el id de sede desde el aula
		// */
		//variable con la conexion a la base y traer id sede
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("select s.id
											  from aulas as a, sedes as s, distribuciones_academicas as da
											  where da.id_aulas_x_sedes = a.id
											  and a.id_sedes = s.id
											  and a.estado = 1
											  and s.estado = 1
											  group by s.id");
		$idSedes = $command->queryAll();
		$idSedes = $idSedes[0]['id'];
		// /**
		// * Se trae el id de institucion desde sede
		// */
		$command = $connection->createCommand(" select i.id
												  from sedes as s, instituciones as i
												  where s.id_instituciones = i.id
												  and s.estado = 1
												  and i.estado = 1
												  and s.id = $idSedes");
		$idInstitucion = $command->queryAll();
		$idInstitucion = $idInstitucion[0]['id'];
        
		$model = DistribucionesAcademicas::findOne($id);
		$model->estado = 2;
		$model->update(false);
		
		
		// return $this->redirect('index', [
			// 'idSedes' 		=> $idSedes,
			// 'idInstitucion' => $idInstitucion,
        // ]);
		
		return $this->redirect(['index', 'idInstitucion' => $idInstitucion,'idSedes'=>$idSedes]);
    }

    /**
     * Finds the DistribucionesAcademicas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return DistribucionesAcademicas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DistribucionesAcademicas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
	
	 /**
     * Esta funcion lista las asignaturas por sede nivel que estan activas.
     * 
     * @param Recibe id sedes nivel
     * @return la lista de asignaturas
     * @throws no tiene excepciones
     */		
  public function actionListarA($idSedesNiveles )
	{
		
		
		//variable con la conexion a la base de datos
		$connection = Yii::$app->getDb();
		//saber el id de la sede para redicionar al index correctamente
		$command = $connection->createCommand("SELECT ans.id, a.descripcion
												FROM asignaturas_x_niveles_sedes as ans, asignaturas as a, sedes_niveles as sn
												WHERE a.estado = 1
												AND a.id = ans.id_asignaturas
												AND ans.id_sedes_niveles = sn.id
												AND sn.id = $idSedesNiveles");
		$result = $command->queryAll();
		
		return Json::encode( $result );
		
	
	}    

	//trae la iformacion del horario con respeto al docente y a la sede
  public function actionHorario($idSedes,$idDocente)
	{
		
		
		//variable con la conexion a la base de datos
		$connection = Yii::$app->getDb();
		
		//que materias se dan y en que dias en la sede actual
		$command = $connection->createCommand("
		select da.id , d.descripcion as dias, b.descripcion as bloques, a.descripcion as asignatura,
		pa.descripcion as grupo, au.descripcion as aula
			from distribuciones_academicas as da, asignaturas_x_niveles_sedes as ans, sedes_niveles as sn, dias as d, 
			bloques as b , distribuciones_x_bloques_x_dias as dbd, sedes_x_bloques as sb, asignaturas as a, personas as p,perfiles_x_personas as pp,
			paralelos as pa, aulas as au
			where da.id_asignaturas_x_niveles_sedes = ans.id
			AND sn.id = ans.id_sedes_niveles
			AND sn.id_sedes = $idSedes
			AND da.estado = 1
			AND dbd.id_distribuciones_academicas = da.id
			AND dbd.id_dias = d.id
			AND dbd.id_bloques_sedes = sb.id
			AND sb.id_bloques = b.id
			AND ans.id_asignaturas= a.id
			AND da.id_perfiles_x_personas_docentes = pp.id
			and pp.id_personas=p.id
			and da.id_paralelo_sede= pa.id
			and p.estado = 1
			and pa.estado= 1
			and da.estado= 1
			and da.id_perfiles_x_personas_docentes = $idDocente
			and da.id_aulas_x_sedes = au.id");
			$result = $command->queryAll();
		
			$command = $connection->createCommand("SELECT id, descripcion
			FROM dias
			where estado  =1
			order by id");
			$dias = $command->queryAll();
			
			
			$command = $connection->createCommand("
			SELECT b.id, b.descripcion
			FROM bloques as b, sedes_x_bloques as sb 
			where b.estado  =1
			and sb.id_sedes =$idSedes
			and sb.id_bloques = b.id
			order by id asc");
			$bloques = $command->queryAll();
			
			
			//se crea un array con los bloque de la sede VS los dias de la semana con el valor no asignado
			foreach ($dias as $dia)
			{
				foreach ($bloques as $bloque)
				{
					//$bloque['descripcion'] nombre del bloque 
					//$dia['descripcion'] dia de la semana
					$arrayHorario[$bloque['descripcion']][$dia['descripcion']]="-"."</insertar>";
				}
				
				
			}
			
			//en la ubicacion bloque - dia se pone el nombrede la asignatura - group - aula que da ese docente $idDocente
			foreach($result as $r)
			{
				
				$arrayHorario[$r['bloques']][$r['dias']]=$r['asignatura']." |".$r['grupo']."|".$r['aula']."</actualizar=".$r['id']."";
			}
			
			
			//se construye el formato json para llenar el dataTable
			$data='[';
			$data.='{"bloques":" BLOQUE ","LUNES":"LUNES","MARTES":"MARTES","MIERCOLES":"MIERCOLES","JUEVES":"JUEVES","VIERNES":"VIERNES","SABADO":"SABADO","DOMINGO":"DOMINGO"},';
			foreach($arrayHorario as $arrayHorarioJson=>$valor) 
			{
				$data.='{"bloques":"'.$arrayHorarioJson.'",';
				foreach($valor as $v=>$value)
				{
					// print_r($v);
					$arraydata[]='"'.$v.'":"'.$value.'"';
				}
				$data.=implode(",",$arraydata);
				unset($arraydata);
				$data.='},';
			}
			$data = substr($data, 0, -1);
			$data.=']';
			echo $data;
			// print_r($arrayHorario);
	

		// return Json::encode( $arrayHorario );
		// return Json::encode( $result );
		
	
	}
	
	public function actionListarG($idSedesNiveles,$idSedes)
	{
		
		//variable con la conexion a la base de datos
		$connection = Yii::$app->getDb();
		/**
		* Llenar select de paralelo(grupo) por sede y nivel seleccionado
		*/
		
		$command = $connection->createCommand("SELECT p.id, p.descripcion
												FROM paralelos as p, sedes_niveles as sn
												WHERE sn.id = p.id_sedes_niveles
												AND sn.id_sedes = $idSedes
												and p.id_sedes_niveles = ".$idSedesNiveles."");
		$result = $command->queryAll();
		//se formatea para que lo reconozca el select
		// foreach($result as $key){
			// $grupos[$key['id']]=$key['descripcion'];
		// }
		
		return Json::encode( $result );
	}
	
  public function actionListarBloques($idSede )
	{
		
		
		return Json::encode( $idSede );
	
	}
	
	 /**
     * Esta funcion lista las institucines que estan activas.
     * 
     * @param Recibe id institucion y el id de sedes
     * @return la lista de insticiones
     * @throws no tiene excepciones
     */
	public function actionListarInstituciones( $idInstitucion = 0, $idSedes = 0 )
    {
        return $this->render('listarInstituciones',[
			'idSedes' 		=> $idSedes,
			'idInstitucion' => $idInstitucion,
		] );
    }

	
	// public function actionListarDistribuciones()
	// {
	// // //variable con la conexion a la base de datos
		// // $connection = Yii::$app->getDb();
		// // //saber el id de la sede para redicionar al index correctamente
		// // $command = $connection->createCommand("
		// // SELECT * FROM distribuciones_academicas");
		// // $result = $command->queryAll();
		
		// $comunasTable	 	 = new DistribucionesAcademicas();
		// $dataComunas		 = $comunasTable->find()->all();
									// // ->where( 'comunas_corregimientos.estado=1' )
									// // ->andWhere( 'comunas_corregimientos.id_municipios='.$idMunicipio )
									
		// $comunas	 	 	 = ArrayHelper::map( $dataComunas, 'id', 'estado' );
		
	// // print_r ($comunas);	
	// return Json::encode( $comunas );	
	
	// }
}
