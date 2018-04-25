<?php

namespace app\controllers;

use Yii;
use app\models\Inasistencias;
use app\models\InasistenciasBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InasistenciasController implements the CRUD actions for Inasistencias model.
 */
class InasistenciasController extends Controller
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
     * Lists all Inasistencias models.
     * @return mixed
     */
    public function actionIndex( $idInstitucion = 0, $idSedes = 0, $idDocente = 0, $idGrupo = 0, $idAsignatura = 0, $idPeriodo = 0 )
    {
		if( $idInstitucion == 0 || $idSedes == 0 || $idDocente == 0 || $idGrupo == 0 || $idAsignatura == 0 || $idPeriodo == 0 ){
			
			$searchModel = new InasistenciasBuscar();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
			
			return $this->render('listarInstituciones', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
				
				'idInstitucion' => $idInstitucion,
				'idSedes' 		=> $idSedes,
				'idDocente' 	=> $idDocente,
				'idGrupo' 		=> $idGrupo,
				'idAsignatura' 	=> $idAsignatura,
				'idPeriodo' 	=> $idPeriodo,
			]);
		}
		else{
			
			$searchModel = new InasistenciasBuscar();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

			
			return $this->render('index', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
				
				'idInstitucion' => $idInstitucion,
				'idSedes' 		=> $idSedes,
				'idDocente' 	=> $idDocente,
				'idGrupo' 		=> $idGrupo,
				'idAsignatura' 	=> $idAsignatura,
				'idPeriodo' 	=> $idPeriodo,
			]);
		}
    }

    /**
     * Displays a single Inasistencias model.
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
     * Creates a new Inasistencias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inasistencias();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Inasistencias model.
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
     * Deletes an existing Inasistencias model.
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
     * Finds the Inasistencias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Inasistencias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Inasistencias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
