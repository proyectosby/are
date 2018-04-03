<?php
/**********
Versión: 001
Fecha: 10-03-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de Asignaturas
---------------------------------------
Modificaciones:
Fecha: 02-04-2018
Persona encargada: Edwin Molina Grisales
Cambios realizados: 
Se crea opción 2 del action index correspondiente al reporte de CANTIDAD DE ESTUDIANTES POR GRUPOS con su correspondiente resumido.
Se corrige queries en el método actionIndex, ya que se unió la tabla perfiles sin relación alguna.
---------------------------------------
Modificaciones:
Fecha: 10-03-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - cambios en todas las funciones y 
se agrega el listar dependiente de institucion y sede
se añade funcion actionListarInstituciones
---------------------------------------
**********/
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use app\models\Estudiantes;
use yii\data\SqlDataProvider;


use app\models\Asignaturas;
use app\models\AsginaturasBuscar;
use app\models\Estados;
use app\models\Sedes;
use app\models\Instituciones;
use app\models\Paralelos;
use app\models\SedesJornadas;
use yii\data\ActiveDataProvider;



/**
 * AsignaturasController implements the CRUD actions for Asignaturas model.
 */
class ReportesController extends Controller
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
	
	
	
	public function actionListarInstituciones( $idInstitucion = 0, $idSedes = 0 )
    {
        return $this->render('listarInstituciones',[
			'idSedes' 		=> $idSedes,
			'idInstitucion' => $idInstitucion,
		] );
    }


    /**
     * Lists all Asignaturas models.
     * @return mixed
     */
	 //recibe 2 parametros con la intencion de filtrar por institucion y por sede
    public function actionIndex($idInstitucion = 0, $idSedes = 0)
    {
		
		// Si existe id sedes e institución se muestra la listas de todas las asignaturas correspondientes
		if( $idInstitucion != 0 && $idSedes != 0 )
		{
			
			//instancia del controlador sedes 
			$sedes = new Sedes();
			//buscar todas las sedes 
			$sedes = $sedes->find()->all();
			//formateo del array 
			$sedes = ArrayHelper::map($sedes,'id', 'descripcion' );
			
			
			$searchModel = new AsginaturasBuscar();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
			//se agregar el andwhere( 'id_sedes='.$idSedes) para que las vista muestre solo las asignatura de la sede seleccionada
			$dataProvider->query->andwhere( 'id_sedes='.$idSedes);
			//y solo los que tengan estado activo
			$dataProvider->query->andwhere( 'estado=1');
				
			return $this->render('index', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
				'idSedes' 		=> $idSedes,
				'idInstitucion' => $idInstitucion,
				//se envia la variable sedes a la vista index para mostrar la descripcion de la sede en vez de su Id
				'sedes' 	=>$sedes,
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
     * Displays a single Asignaturas model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
		
        return $this->render('view', [
            'model' => $this->findModel($id),	
        ]);
    }

	
	public function actionReportes($idReporte,$idSedes,$idInstitucion)
    {
		
		$dataProviderCantidad = "";
		
		switch ($idReporte) 
		{
			case 1:
			$sql ="
				SELECT p.identificacion, concat(p.nombres,' ',p.apellidos) as nombres, p.domicilio, j.descripcion
				FROM personas as p, 
					 perfiles_x_personas as pp, 
					 estudiantes as e, 
					 paralelos as pa, 
					 sedes_jornadas as sj, 
					 jornadas as j, 
					 sedes as s, 
					 instituciones as i
				   where p.estado = 1
				   and e.estado = 1
				   and e.id_perfiles_x_personas = pp.id
				   and pp.id_perfiles=11
				   and pp.id_personas = p.id
				   and e.id_paralelos = pa.id
				   and pa.id_sedes_jornadas = sj.id
				   and sj.id_jornadas = j.id
				   and sj.id_sedes = $idSedes
				   and s.id_instituciones = i.id
				   and i.id = $idInstitucion
				   group by p.identificacion, p.nombres,p.apellidos, p.domicilio, j.descripcion
				   ";
				
				$dataProvider = new SqlDataProvider([
						'sql' => $sql,
						
						
					]);
				break;
			case 2:
			
				$sql ="SELECT p.identificacion, concat(p.nombres,' ',p.apellidos) as nombres, p.domicilio, j.descripcion, pa.descripcion as grupo, n.descripcion as nivel
					     FROM personas as p, 
							  perfiles_x_personas as pp, 
							  estudiantes as e,
							  paralelos as pa, 
							  sedes_jornadas as sj, 
							  jornadas as j, 
							  sedes as s,
							  instituciones as i,
							  sedes_niveles sn,
							  niveles n
					    WHERE p.estado 					= 1
					      AND e.estado 					= 1
					      AND e.id_perfiles_x_personas 	= pp.id
					      AND pp.id_perfiles			= 11
					      AND pp.id_personas 			= p.id
					      AND e.id_paralelos 			= pa.id
					      AND pa.id_sedes_jornadas 		= sj.id
					      AND sj.id_jornadas 			= j.id
					      AND sj.id_sedes 				= $idSedes
					      AND s.id_instituciones 		= i.id
					      AND i.id 						= $idInstitucion
						  AND sn.id 					= pa.id_sedes_niveles
						  AND sn.id_sedes 				= s.id
						  AND n.id						= sn.id_niveles
						  AND n.estado 					= 1
					";
			
			
				$dataProvider = new SqlDataProvider([
					'sql' => $sql,
				]);
				
				$sql ="SELECT pa.descripcion as grupo, n.descripcion as nivel, count(*) as cantidad
					     FROM personas as p, 
							  perfiles_x_personas as pp, 
							  estudiantes as e, 
							  paralelos as pa, 
							  sedes_jornadas as sj, 
							  jornadas as j, 
							  sedes as s,
							  instituciones as i,
							  sedes_niveles sn,
							  niveles n
					    WHERE p.estado 					= 1
					      AND e.estado 					= 1
					      AND e.id_perfiles_x_personas 	= pp.id
					      AND pp.id_perfiles			= 11
					      AND pp.id_personas 			= p.id
					      AND e.id_paralelos 			= pa.id
					      AND pa.id_sedes_jornadas 		= sj.id
					      AND sj.id_jornadas 			= j.id
					      AND sj.id_sedes 				= 48
					      AND s.id_instituciones 		= i.id
					      AND i.id 						= 55
						  AND sn.id 					= pa.id_sedes_niveles
						  AND sn.id_sedes 				= s.id
						  AND n.id						= sn.id_niveles
						  AND n.estado 					= 1
					 GROUP BY grupo, nivel
					";
			
			
				$dataProviderCantidad = new SqlDataProvider([
					'sql' => $sql,
				]);
				
				break;
			case 3:
				
				$sql ="SELECT p.identificacion, concat(p.nombres,' ',p.apellidos) as nombres, p.domicilio, j.descripcion, pa.descripcion as grupo, n.descripcion as nivel
					     FROM personas as p, 
							  perfiles_x_personas as pp, 
							  estudiantes as e,
							  paralelos as pa, 
							  sedes_jornadas as sj, 
							  jornadas as j, 
							  sedes as s,
							  instituciones as i,
							  sedes_niveles sn,
							  niveles n
					    WHERE p.estado 					= 1
					      AND e.estado 					= 1
					      AND e.id_perfiles_x_personas 	= pp.id
					      AND pp.id_perfiles			= 11
					      AND pp.id_personas 			= p.id
					      AND e.id_paralelos 			= pa.id
					      AND pa.id_sedes_jornadas 		= sj.id
					      AND sj.id_jornadas 			= j.id
					      AND sj.id_sedes 				= $idSedes
					      AND s.id_instituciones 		= i.id
					      AND i.id 						= $idInstitucion
						  AND sn.id 					= pa.id_sedes_niveles
						  AND sn.id_sedes 				= s.id
						  AND n.id						= sn.id_niveles
						  AND n.estado 					= 1
					";
			
			
				$dataProvider = new SqlDataProvider([
					'sql' => $sql,
				]);
				
				$sql ="SELECT pa.descripcion as grupo, n.descripcion as nivel, count(*) as cantidad
					     FROM personas as p, 
							  perfiles_x_personas as pp, 
							  estudiantes as e, 
							  paralelos as pa, 
							  sedes_jornadas as sj, 
							  jornadas as j, 
							  sedes as s,
							  instituciones as i,
							  sedes_niveles sn,
							  niveles n
					    WHERE p.estado 					= 1
					      AND e.estado 					= 1
					      AND e.id_perfiles_x_personas 	= pp.id
					      AND pp.id_perfiles			= 11
					      AND pp.id_personas 			= p.id
					      AND e.id_paralelos 			= pa.id
					      AND pa.id_sedes_jornadas 		= sj.id
					      AND sj.id_jornadas 			= j.id
					      AND sj.id_sedes 				= 48
					      AND s.id_instituciones 		= i.id
					      AND i.id 						= 55
						  AND sn.id 					= pa.id_sedes_niveles
						  AND sn.id_sedes 				= s.id
						  AND n.id						= sn.id_niveles
						  AND n.estado 					= 1
					 GROUP BY grupo, nivel
					";
			
			
				$dataProviderCantidad = new SqlDataProvider([
					'sql' => $sql,
				]);
			
				break;
		}
		
		return $this->render('reporte', [
				'dataProvider'		=> $dataProvider,
				'dataProviderCantidad'=> $dataProviderCantidad,
				'idReporte'			=> $idReporte,
				'idSedes' 			=> $idSedes,
				'idInstitucion' 	=> $idInstitucion,
			]);
    }
	
    /**
     * Creates a new Asignaturas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idSedes, $idInstitucion)
    {
				
		//se selecciona el estado activo siempre se crea activo
		$estados = new Estados();
		$estados = $estados->find()->where('id=1')->all();
		$estados = ArrayHelper::map($estados,'id','descripcion');
		
		//se seleccionan solo la sede actual 
		$sedes = new Sedes();
		$sedes = $sedes->find()->where('id='.$idSedes)->all();
		$sedes = ArrayHelper::map($sedes,'id','descripcion');
		
        $model = new Asignaturas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
			'estados'=>$estados,
			'sedes'=>$sedes,
        ]);
    }

    /**
     * Updates an existing Asignaturas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		$model = $this->findModel($id);
		
		//se seleccionan todos los estados para mostrarlos en la vista 
		$estados = new Estados();
		$estados = $estados->find()->all();
		$estados = ArrayHelper::map($estados,'id','descripcion');
		
		//se seleccionan solo la sede actual para mostrar en la vista update
		$sedes = new Sedes();
		$sedes = $sedes->find()->where('id='.$model->id_sedes)->all();
		$sedes = ArrayHelper::map($sedes,'id','descripcion');
		
		
       
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
			'estados'=>$estados,
			'sedes'=>$sedes,
        ]);
    }

    /**
     * Deletes an existing Asignaturas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
	 
	 //Se cambia para que no borre, en cambio actualiza el campo estado a 2;
    public function actionDelete($id)
    {
		
		$model = $this->findModel($id);
		$idSedes= $model->id_sedes;
		//variable con la conexion a la base de datos
		$connection = Yii::$app->getDb();
		//saber el id de la sede para redicionar al index correctamente
		$command = $connection->createCommand("
		SELECT i.id
		FROM instituciones as i,sedes as s
		WHERE s.id_instituciones = i.id
		and s.id = $idSedes
		");
		$result = $command->queryAll();
		$idInstituciones = $result[0]['id'];
		
		$model = Asignaturas::findOne($id);
		$model->estado = 2;
		$idInstitucion = $model->id;
		$model->update(false);

		return $this->redirect(['index', 'idInstitucion' => $idInstituciones,'idSedes'=>$idSedes]);		
		
    }

    /**
     * Finds the Asignaturas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Asignaturas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Asignaturas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('La página que está solicitando no existe.');
    }
}
