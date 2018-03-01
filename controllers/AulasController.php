<?php

namespace app\controllers;

use Yii;
use app\models\Aulas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Sedes;
use app\models\TiposAulas;
use yii\helpers\ArrayHelper;

/**
 * AulasController implements the CRUD actions for Aulas model.
 */
class AulasController extends Controller
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
     * Lists all Aulas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Aulas::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Aulas model.
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
     * Creates a new Aulas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		
		$sedesTable 		= new Sedes();
		$dataSedes	 		= $sedesTable->find()->all();
		$sedes				= ArrayHelper::map( $dataSedes, 'id', 'descripcion' );
		
		$tiposAulasTable 	= new TiposAulas();
		$dataTiposAulas	 	= $tiposAulasTable->find()->all();
		$tiposAulas			= ArrayHelper::map( $dataTiposAulas, 'id', 'descripcion' );
		
        $model = new Aulas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' 	 => $model,
            'sedes' 	 => $sedes,
            'tiposAulas' => $tiposAulas,
        ]);
    }

    /**
     * Updates an existing Aulas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		$sedesTable 		= new Sedes();
		$dataSedes	 		= $sedesTable->find()->all();
		$sedes				= ArrayHelper::map( $dataSedes, 'id', 'descripcion' );
		
		$tiposAulasTable 	= new TiposAulas();
		$dataTiposAulas	 	= $tiposAulasTable->find()->all();
		$tiposAulas			= ArrayHelper::map( $dataTiposAulas, 'id', 'descripcion' );
		
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' 	 => $model,
			'sedes' 	 => $sedes,
            'tiposAulas' => $tiposAulas,
        ]);
    }

    /**
     * Deletes an existing Aulas model.
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
     * Finds the Aulas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Aulas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aulas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
