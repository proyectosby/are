<?php

namespace app\controllers;

use app\models\Periodos;
use app\models\Estados;


use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * PeriodosController implements the CRUD actions for Periodos model.
 */
class PeriodosController extends Controller
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
     * Lists all Periodos models.
     * @return mixed
     */
    public function actionIndex()
    {
         $dataProvider = new ActiveDataProvider([
            'query' => Periodos::find()->where('estado=1'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Periodos model.
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
     * Creates a new Periodos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		
		$estados		 = new Estados();
		$estados		 = $estados->find()->orderby('descripcion')->where( 'id=1' )->all();
		$estados	 	 = ArrayHelper::map( $estados, 'id', 'descripcion' );
		
        $model = new Periodos();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
			'estados'=>$estados,
        ]);
    }

    /**
     * Updates an existing Periodos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		
		$estados		 = new Estados();
		$estados		 = $estados->find()->orderby('descripcion')->all();
		$estados	 	 = ArrayHelper::map( $estados, 'id', 'descripcion' );
		
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
			'estados'=>$estados,
        ]);
		
		
    }

    /**
     * Deletes an existing Periodos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = Periodos::findOne($id);
		$model->estado = 2;
		$model->update(false);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Periodos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Periodos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Periodos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}


  










