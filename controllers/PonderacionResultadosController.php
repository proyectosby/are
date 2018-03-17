<?php
/**********
Versión: 001
Fecha: 17-03-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de AsignaturasNivelesSedes
---------------------------------------
Modificaciones:
Fecha: 17-03-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - se elimina el campo id para mostrar

---------------------------------------
**********/

namespace app\controllers;

use Yii;
use app\models\PonderacionResultados;
use app\models\PonderacionResultadosBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Periodos;
use app\models\Estados;
use	yii\helpers\ArrayHelper;


/**
 * PonderacionResultadosController implements the CRUD actions for PonderacionResultados model.
 */
class PonderacionResultadosController extends Controller
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
     * Lists all PonderacionResultados models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PonderacionResultadosBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andwhere( 'estado=1');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PonderacionResultados model.
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
     * Creates a new PonderacionResultados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		//se envia la variable periodos con los valores de la tabla periodos
		$periodos = new Periodos();
		$periodos = $periodos->find()->all();
		$periodos = ArrayHelper::map($periodos,'id','descripcion');
		
		
		//se envia la variable estados con los valores de la tabla estado, siempre es activo
		$estados = new Estados();
		$estados = $estados->find()->where('id=1')->all();
		$estados = ArrayHelper::map($estados,'id','descripcion');
		
        $model = new PonderacionResultados();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
			'periodos'=>$periodos,
			'estados'=>$estados,
        ]);
    }

    /**
     * Updates an existing PonderacionResultados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		//se envia la variable periodos con los valores de la tabla periodos
		$periodos = new Periodos();
		$periodos = $periodos->find()->all();
		$periodos = ArrayHelper::map($periodos,'id','descripcion');
		
		
		//se envia la variable estados con los valores de la tabla estado, siempre es activo
		$estados = new Estados();
		$estados = $estados->find()->all();
		$estados = ArrayHelper::map($estados,'id','descripcion');
		
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
			'periodos'=>$periodos,
			'estados'=>$estados,
        ]);
    }

    /**
     * Deletes an existing PonderacionResultados model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
		
		$model = PonderacionResultados::findOne($id);
		$model->estado = 2;
		$idInstitucion = $model->id;
		$model->update(false);
		
        // $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PonderacionResultados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PonderacionResultados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PonderacionResultados::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
