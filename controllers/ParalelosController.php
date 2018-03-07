<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\Jornadas;
use app\models\Niveles;
use app\models\Paralelos;
use app\models\Sedes;
use app\models\SedesJornadas;

/**
 * ParalelosController implements the CRUD actions for Paralelos model.
 */
class ParalelosController extends Controller
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
     * Lists all Paralelos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Paralelos::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Paralelos model.
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
     * Creates a new Paralelos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Paralelos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Paralelos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		
		$query = (new \yii\db\Query())
		->select('id_sedes_jornadas,id_sedes_niveles')
		->from('paralelos')
		->where('id='.$id);
		$command = $query->createCommand();
		$rows = $command->queryAll();
		
		$idJornadas	= @$_POST['Paralelos']['id_sedes_jornadas'];
		$idNiveles	= @$_POST['Paralelos']['id_sedes_niveles'];	
			
		$id_sedes_jornadas = $rows[0]['id_sedes_jornadas'];
		$id_sedes_niveles  = $rows[0]['id_sedes_niveles'];
		
		$_POST['Paralelos']['id_sedes_jornadas']	=$id_sedes_jornadas;
		$_POST['Paralelos']['id_sedes_niveles' ]	=$id_sedes_niveles;
	
		$command->update('sedes_jorndas', array('id_jornadas'=>$idJornadas,),array('id'=>$id_sedes_jornadas));
		$command->update('sedes_niveles', array('id_niveles'=>$idJornadas,),array('id'=>$id_sedes_niveles));
	
	    $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Paralelos model.
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
     * Finds the Paralelos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Paralelos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Paralelos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
