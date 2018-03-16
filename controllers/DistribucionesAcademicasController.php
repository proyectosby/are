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
    public function actionIndex()
    {
        $searchModel = new DistribucionesAcademicasBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DistribucionesAcademicas model.
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
     * Creates a new DistribucionesAcademicas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DistribucionesAcademicas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
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
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
	
	
		
  public function actionListar($idMunicipio )
	{
		
		
		return Json::encode( $idMunicipio );
	
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
