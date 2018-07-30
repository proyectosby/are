<?php

namespace app\controllers;

use Yii;
use app\models\InstrumentoPoblacionEstudiantes;
use app\models\InstrumentoPoblacionEstudiantesBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Instituciones;
use app\models\Sedes;
use app\models\Personas;
use app\models\Estados;
use app\models\Fases;
use app\models\Sesiones;
use app\models\PoblacionEstudiantesSesion;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;


/**
 * InstrumentoPoblacionEstudiantesController implements the CRUD actions for InstrumentoPoblacionEstudiantes model.
 */
class InstrumentoPoblacionEstudiantesController extends Controller
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
	
	function actionSede(){
		
		$sede 		 = Yii::$app->request->post('sede');
		$institucion = Yii::$app->request->post('institucion');
		
		$sede 		 = Sedes::findOne( $sede );
		$institucion = Instituciones::findOne( $institucion );
		
		return $this->renderPartial( 'sede', [
			'sede' 		=> $sede,
			'institucion' 	=> $institucion,
        ]);
	}
	
	function actionEstudiantes(){
		
		$estudiante = Yii::$app->request->post('estudiante');
		
		$persona = Personas::findOne( $estudiante );
		
		return $this->renderPartial( 'estudiantes', [
			'persona' 	=> $persona,
        ]);
	}
	
	function actionEstudiantesPorSede(){
		
		$sede = Yii::$app->request->get('sede');
		
		$data = Personas::find()
					->innerJoin( 'perfiles_x_personas pp', 'pp.id_personas=personas.id' )
					->innerJoin( 'estudiantes e', 'e.id_perfiles_x_personas=pp.id' )
					->innerJoin( 'paralelos p', 'p.id=e.id_paralelos' )
					->innerJoin( 'sedes_niveles sn', 'sn.id=p.id_sedes_niveles' )
					->where( 'sn.id_sedes='.$sede )
					->andWhere( 'pp.estado=1' )
					->andWhere( 'e.estado=1' )
					->andWhere( 'p.estado=1' )
					->andWhere( 'personas.estado=1' )
					->all();
		
		return Json::encode( $data );
	}
	
	function actionViewFases(){
		
		$institucion 	= Yii::$app->request->post()['institucion'];
		$sede 			= Yii::$app->request->post()['sede'];
		$estudiante		= Yii::$app->request->post()['estudiante'];
		
		$idPE = InstrumentoPoblacionEstudiantes::findOne([
					'id_institucion' 		=> $institucion,
					'id_sede' 		 		=> $sede,
					'id_persona_estudiante' => $estudiante,
				]);
				
		$fases	= Fases::find()
					->where('estado=1')
					->all();
		
		return $this->renderPartial('fases', [
			'idPE' 	=> $idPE,
			'fases' => $fases,
        ]);
		
	}
	
    /**
     * Lists all InstrumentoPoblacionEstudiantes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InstrumentoPoblacionEstudiantesBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InstrumentoPoblacionEstudiantes model.
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
     * Creates a new InstrumentoPoblacionEstudiantes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionGuardar()
	{
		// echo "<pre>"; var_dump( $_POST );  echo "</pre>"; exit();
		$data = [
					'error' => 0,
					'msg' => '',
					'html' => '',
				];
		
		$instrumentoPoblacionEstudiantes = Yii::$app->request->post()['InstrumentoPoblacionEstudiantes'];
		
		$model = InstrumentoPoblacionEstudiantes::findOne([
						'id_institucion' 		=> $instrumentoPoblacionEstudiantes[ 'id_institucion' ],
						'id_sede' 				=> $instrumentoPoblacionEstudiantes[ 'id_sede' ],
						'id_persona_estudiante' => $instrumentoPoblacionEstudiantes[ 'id_persona_estudiante' ],
						'estado' 				=> '1',
					]);
					
		if( !$model ){
			$model = new InstrumentoPoblacionEstudiantes();
		}
		
		if( $model->load(Yii::$app->request->post()) )
		{
			if( $model->save() ){
				
				$poblaciones = Yii::$app->request->post()['PoblacionEstudiantesSesion'];
				
				foreach( $poblaciones as $key => $poblacion ){
					$modelp	=	PoblacionEstudiantesSesion::findOne([
									'id_poblacion_estudiantes' 	=> $model->id,
									'id_sesiones' 				=> $poblacion[ 'id_sesiones' ],
								]);
					
					if( !$modelp ){
						$modelp	=	new PoblacionEstudiantesSesion();
					}
					
					$modelp->id_poblacion_estudiantes	= $model->id;
					$modelp->id_sesiones				= $poblacion[ 'id_sesiones' ];
					$modelp->valor						= $poblacion[ 'valor' ];
					$modelp->save( false );
				}
				// else{
					// $data['error'] 	= 2;
					// $data['msg'] 	= 'No guarda los datos del estudiantes';
				// }
				
				// return $this->redirect(['view', 'id' => $model->id]);
			}
			else{
				$data['error'] 	= 2;
				$data['msg'] 	= 'No guarda los datos del estudiantes';
			}
        }
		else{
			$data['error'] 	= 1;
			$data['msg'] 	= 'No carga el modelo InstrumentoPoblacionEstudiantes';
		}
		
		// echo json_encode( $data );
		return Json::encode( $data );
	}
	
    public function actionCreate()
    {
		
		// echo "<pre>"; var_dump( $_POST );  echo "</pre>"; exit();
        $model = new InstrumentoPoblacionEstudiantes();
		
		$dataInstituciones 	= Instituciones::find()
								->where( 'estado=1' )
								->all();
		
		$instituciones		= ArrayHelper::map( $dataInstituciones, 'id', 'descripcion' );
		
		$dataSedes 			= Sedes::find()
								->where( 'estado=1' )
								->all();
		
		$sedes		= ArrayHelper::map( $dataSedes, 'id', 'descripcion' );
		
		$dataPersonas 		= Personas::find()
								->select( "( nombres || ' ' || apellidos ) as nombres, id" )
								->where( 'estado=1' )
								->all();
		
		$estudiantes		= ArrayHelper::map( $dataPersonas, 'id', 'nombres' );
		
		
		// $dataEstados 		= Estados::find()
								// ->where( 'id=1' )
								// ->all();
		
		// $estados			= ArrayHelper::map( $dataEstados, 'id', 'descripcion' );
		
		$dataPoblacion 		= PoblacionEstudiantesSesion::find()
								->where( 'id=1' )
								->all();
		
		$poblacion			= ArrayHelper::map( $dataPoblacion, 'id', 'descripcion' );
							

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' 		=> $model,
            'instituciones' => $instituciones,
            'sedes' 		=> $sedes,
            'estudiantes'	=> $estudiantes,
            'estados'		=> 1,
        ]);
    }

    /**
     * Updates an existing InstrumentoPoblacionEstudiantes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		
		$dataInstituciones 	= Instituciones::find()
								->where( 'estado=1' )
								->all();
		
		$instituciones		= ArrayHelper::map( $dataInstituciones, 'id', 'descripcion' );
		
		$dataSedes 			= Sedes::find()
								->where( 'estado=1' )
								->all();
		
		$sedes		= ArrayHelper::map( $dataSedes, 'id', 'descripcion' );
		
		$dataPersonas 		= Personas::find()
								->select( "( nombres || ' ' || apellidos ) as nombres, id" )
								->where( 'estado=1' )
								->all();
		
		$estudiantes		= ArrayHelper::map( $dataPersonas, 'id', 'nombres' );
		
		
		$dataEstados 		= Estados::find()
								->where( 'id=1' )
								->all();
		
		$estados			= ArrayHelper::map( $dataEstados, 'id', 'descripcion' );
		
		$dataPoblacion 		= PoblacionEstudiantesSesion::find()
								->where( 'id=1' )
								->all();
		
		$poblacion			= ArrayHelper::map( $dataEstados, 'id', 'descripcion' );
							

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'instituciones' => $instituciones,
            'sedes' 		=> $sedes,
            'estudiantes'	=> $estudiantes,
            'estados'		=> $estados,
        ]);
    }

    /**
     * Deletes an existing InstrumentoPoblacionEstudiantes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InstrumentoPoblacionEstudiantes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return InstrumentoPoblacionEstudiantes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InstrumentoPoblacionEstudiantes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
