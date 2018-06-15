<?php

namespace app\controllers;

if(@$_SESSION['sesion']=="si")
{ 
	// echo $_SESSION['nombre'];
} 
//si no tiene sesion se redirecciona al login
else
{
	echo "<script> window.location=\"index.php?r=site%2Flogin\";</script>";
	die;
}
use Yii;
use app\models\InfraestructuraEducativaBuscar;
use app\models\InfraestructuraEducativa;
use app\models\Sedes;
use app\models\Estados;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;
use	yii\helpers\ArrayHelper;
/**
 * InfraestructuraEducativaController implements the CRUD actions for InfraestructuraEducativa model.
 */
class InfraestructuraEducativaController extends Controller
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
	
	
	
	public function obtenerSedes($idInstitucion)
	{
		$sedes = new Sedes();
		$sedes = $sedes->find()->where('id_instituciones='.$idInstitucion)->all();
		$sedes = ArrayHelper::map($sedes,'id','descripcion');
		
		return $sedes;
	}

	public function obtenerEstados()
	{
		$estados = new Estados();
		$estados = $estados->find()->orderby("id")->all();
		$estados = ArrayHelper::map($estados,'id','descripcion');
		
		return $estados;
	}
	
	public function actionListarInstituciones( $idInstitucion = 0 )
    {
        return $this->render('listarInstituciones',[
			'idInstitucion' => $idInstitucion,
		] );
    }

    /**
     * Lists all InfraestructuraEducativa models.
     * @return mixed
     */
    public function actionIndex($idInstitucion = 0)
    {
		if( $idInstitucion != 0)
		{
			
			//Muestra solo las sedes que tenga esa institucion
			$searchModel = new InfraestructuraEducativaBuscar();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);			
			$dataProvider->query->select 	("ie.*");
			$dataProvider->query->from	 	( 'infraestructura_educativa as ie, sedes as se');
			$dataProvider->query->andwhere	( " ie.id_sede = se.id
												AND se.id_instituciones = $idInstitucion
												AND ie.estado = 1
											");
		

			return $this->render('index', [
				'dataProvider' => $dataProvider,
				'searchModel' => $searchModel,
				'idInstitucion' => $idInstitucion,
				]);
		}
		else
		{
			// Si el id de institucion o de sedes es 0 se llama a la vista listarInstituciones
			 return $this->render('listarInstituciones',[
				'idInstitucion' => $idInstitucion,
			] );
		}

    }

    /**
     * Displays a single InfraestructuraEducativa model.
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
     * Creates a new InfraestructuraEducativa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idInstitucion)
    {
        $model = new InfraestructuraEducativa();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
	
		$sedes = $this->obtenerSedes($idInstitucion);
		$estados = $this->obtenerEstados();
		
        return $this->render('create', [
            'model' => $model,
			'sedes'=> $sedes,
			'estados'=>$estados,
			'idInstitucion'=>$idInstitucion,
        ]);
    }

    /**
     * Updates an existing InfraestructuraEducativa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
		
		$idInstitucion = Sedes::findOne($model->id_sede);
		$idInstitucion = $idInstitucion ? $idInstitucion->id_instituciones : '';  
		
		
		$sedes = $this->obtenerSedes($idInstitucion);
		$estados = $this->obtenerEstados();
		
		
		
        return $this->render('update', [
            'model' => $model,
			'sedes'=> $sedes,
			'estados'=>$estados,
			'idInstitucion'=>$idInstitucion,
        ]);
    }

    /**
     * Deletes an existing InfraestructuraEducativa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
		
		$idInstitucion = Sedes::findOne($model->id_sede);
		$idInstitucion = $idInstitucion ? $idInstitucion->id_instituciones : '';
		
		$model->estado = 2;
		$model->update(false);
		return $this->redirect(['index', 'idInstitucion' => $idInstitucion]);
		
		
    }

    /**
     * Finds the InfraestructuraEducativa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return InfraestructuraEducativa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InfraestructuraEducativa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
