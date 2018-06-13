<?php

/**********
Versión: 001
Fecha: 16-04-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de Apoyo Academico
---------------------------------------
Modificaciones:
Fecha: 12-06-2018
Persona encargada: Edwin Molina Grisales
Cambios realizados: Solo se muestra los doctores y estudiantes correspondientes a la institución seleccionada
---------------------------------------
Modificaciones:
Fecha: 16-04-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - se agrega el listar sede e institucion
muestra solo los apoyos academicos de la sede seleccionada
---------------------------------------
Modificaciones:
Fecha: 7-04-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - se modificar la funcion ActionUpdate
---------------------------------------
**********/
namespace app\controllers;

use Yii;
use app\models\ApoyoAcademico;
use app\models\ApoyoAcademicoBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Sedes;

/**
 * ApoyoAcademicoController implements the CRUD actions for ApoyoAcademico model.
 */
class ApoyoAcademicoController extends Controller
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
	
	
	
	public function actionListarInstituciones( $idInstitucion = 0, $idSedes = 0, $AAcademico = 0 )
    {
        return $this->render('listarInstituciones',[
			'idSedes' 		=> $idSedes,
			'idInstitucion' => $idInstitucion,
			'AAcademico'=>$AAcademico,
		] );
    }


    /**
     * Lists all ApoyoAcademico models.
     * @return mixed
     */
    public function actionIndex($idInstitucion = 0, $idSedes = 0, $AAcademico = 0)
    {
		//si alguno es 0 lo regresa a la vista para que seleccione
		if( $idInstitucion != 0 && $idSedes != 0 && $AAcademico!=0 )
		{
			//muestra solo los de la sede actual y estado activo
			$searchModel = new ApoyoAcademicoBuscar();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
			$dataProvider->query->andWhere('id_sede='.$idSedes);
			$dataProvider->query->andWhere('estado=1');

			return $this->render('index', [
				'searchModel' 	=> $searchModel,
				'dataProvider' 	=> $dataProvider,'idSedes' 	=> $idSedes,
				'idInstitucion' => $idInstitucion,
				'idSedes' 		=> $idSedes,
				'idInstitucion' => $idInstitucion,
				'AAcademico'	=>$AAcademico
				]);
		}
		else
		{
			// Si el id de institucion o de sedes es o de Apoyo Academico es 0 se llama a la vista listarInstituciones
			 return $this->render('listarInstituciones',[
				'idSedes' 		=> $idSedes,
				'idInstitucion' => $idInstitucion,
				'AAcademico' 	=>$AAcademico,
			] );
		}

    }

    /**
     * Displays a single ApoyoAcademico model.
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

    /**
     * Creates a new ApoyoAcademico model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idSedes, $idInstitucion, $AAcademico)
    {
		
		/**
		* Llenar nombre de los doctores
		*/
		//variable con la conexion a la base de datos 
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("
			SELECT pp.id as id, concat(pe.nombres,' ',pe.apellidos) as nombres
			  FROM public.perfiles_x_personas as pp, public.personas as pe, perfiles_x_personas_institucion ppi
			 WHERE pp.id_personas = pe.id
			   AND pp.id_perfiles = 16
			   AND ppi.id_perfiles_x_persona = pp.id
			   AND ppi.id_institucion = $idInstitucion
		");
		$result = $command->queryAll();
		$doctores = array();
		foreach ($result as $r)
		{
			$doctores[$r['id']]= $r['nombres'];
		}
				
		
		/**
		* Llenar nombre del estudiante
		*/
		//variable con la conexion a la base de datos 
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("
			SELECT es.id_perfiles_x_personas as id, concat(pe.nombres,' ',pe.apellidos) as nombres
			  FROM public.estudiantes as es, public.perfiles_x_personas as pp, public.personas as pe, perfiles_x_personas_institucion ppi
			 WHERE es.id_perfiles_x_personas = pp.id
			   AND pp.id_personas = pe.id
			   AND pp.id_perfiles = 11
			   AND ppi.id_perfiles_x_persona = pp.id
			   AND ppi.id_institucion = $idInstitucion
		");
		$result = $command->queryAll();
		$estudiantes = array();
		foreach ($result as $r)
		{
			$estudiantes[$r['id']]= $r['nombres'];
		}
		
		
        $model = new ApoyoAcademico();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' 		=> $model,
			'estudiantes'	=> $estudiantes,
			'doctores' 		=> $doctores,
			'idSedes' 		=> $idSedes,
			'idInstitucion' => $idInstitucion,
			'AAcademico'	=> $AAcademico
        ]);
    }

    /**
     * Updates an existing ApoyoAcademico model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		$model = $this->findModel($id);
		
		$idSedes = $model->id_sede;
		$institucion = Sedes::findOne($idSedes);
		
		/**
		* Llenar nombre de los doctores
		*/
		//variable con la conexion a la base de datos 
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("
		SELECT pp.id as id, concat(pe.nombres,' ',pe.apellidos) as nombres
		FROM public.perfiles_x_personas as pp, public.personas as pe
		where pp.id_personas = pe.id
		and pp.id_perfiles = 16
		");
		$result = $command->queryAll();
		$doctores = array();
		foreach ($result as $r)
		{
			$doctores[$r['id']]= $r['nombres'];
		}
		
		//variable con la conexion a la base de datos 
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand("
		SELECT es.id_perfiles_x_personas as id, concat(pe.nombres,' ',pe.apellidos) as nombres
		FROM public.estudiantes as es, public.perfiles_x_personas as pp, public.personas as pe
		where es.id_perfiles_x_personas = pp.id
		and pp.id_personas = pe.id
		and pp.id_perfiles = 11
		");
		$result = $command->queryAll();
		$estudiantes = array();
		foreach ($result as $r)
		{
			$estudiantes[$r['id']]= $r['nombres'];
		}
		

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' 		=> $model,
			'estudiantes'	=> $estudiantes,
			'doctores' 		=> $doctores,
			'idSedes' 		=> $idSedes,
			'idInstitucion' => $institucion->id_instituciones,
			'AAcademico'	=> $model->id_tipo_apoyo,
        ]);
    }

    /**
     * Deletes an existing ApoyoAcademico model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
	 
	//cambia el estado a 2 para borrar los datos
    public function actionDelete($id)
    {
       
		$model = $this->findModel($id);
		$model->estado = 2;
		$model->update(false);
		
		$idSedes = $model->id_sede;
		$idInstitucion = Sedes::find()->where(['id' => $idSedes])->one();
		$idInstitucion = $idInstitucion->id_instituciones;
		
		return $this->redirect(['index', 'idInstitucion' => $idInstitucion, 'idSedes' => $idSedes,'AAcademico'	=> $model->id_tipo_apoyo]);
		
    }

    /**
     * Finds the ApoyoAcademico model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return ApoyoAcademico the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ApoyoAcademico::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
