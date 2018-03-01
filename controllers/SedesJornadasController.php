<?php

namespace app\controllers;

use Yii;
use app\models\SedesJornadas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use app\models\Sedes;
use app\models\Jornadas;
use yii\helpers\ArrayHelper;
/**
 * SedesJornadasController implements the CRUD actions for SedesJornadas model.
 */
class SedesJornadasController extends Controller
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
     * Lists all SedesJornadas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SedesJornadas::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SedesJornadas model.
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
     * Creates a new SedesJornadas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		
		$jornadasTable 	= new Jornadas();
		$dataJornadas	= $jornadasTable->find()->all();
		$jornadas		= ArrayHelper::map( $dataJornadas, 'id', 'descripcion' );
		
		$sedesTable 	= new Sedes();
		$dataSedes	 	= $sedesTable->find()->all();
		$sedes		 	= ArrayHelper::map( $dataSedes, 'id', 'descripcion' );
		
        $model = new SedesJornadas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model'		=> $model,
            'jornadas' 	=> $jornadas,
            'sedes' 	=> $sedes,
        ]);
    }

    /**
     * Updates an existing SedesJornadas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		
		$jornadasTable 	= new Jornadas();
		$dataJornadas	= $jornadasTable->find()->all();
		$jornadas		= ArrayHelper::map( $dataJornadas, 'id', 'descripcion' );
		
		$sedesTable 	= new Sedes();
		$dataSedes	 	= $sedesTable->find()->all();
		$sedes		 	= ArrayHelper::map( $dataSedes, 'id', 'descripcion' );
		
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'jornadas' 	=> $jornadas,
            'sedes' 	=> $sedes,
        ]);
    }

    /**
     * Deletes an existing SedesJornadas model.
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
     * Finds the SedesJornadas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return SedesJornadas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SedesJornadas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
