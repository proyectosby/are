<?php

/**********
Versión: 001
Fecha: 27-03-2018
---------------------------------------
Modificaciones:
Fecha: 27-03-2018
Se agrega método actionAsignaturasXNivelesSedes
---------------------------------------
**********/

namespace app\controllers;

use Yii;
use app\models\AsignaturasNivelesSedes;
use app\models\Sedes;
use app\models\SedesNiveles;
use app\models\AsignaturasNivelesSedesBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Asignaturas;
use	yii\helpers\ArrayHelper;

/**
 * AsignaturasNivelesSedesController implements the CRUD actions for AsignaturasNivelesSedes model.
 */
class AsignaturasNivelesSedesController extends Controller
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
	
	public function actionAsignaturasXNivelesSedes( $idNivel ){
		
		$asignaturasData = Asignaturas::find()
									  ->innerJoin( 'asignaturas_x_niveles_sedes ans', 'ans.id_asignaturas=asignaturas.id' )
									  ->innerJoin( 'sedes_niveles sn', 'sn.id=ans.id_sedes_niveles' )
									  ->innerJoin( 'niveles n', 'n.id=sn.id_niveles' )
									  ->where( 'n.id='.$idNivel )
									  ->andWhere( 'asignaturas.estado=1' )
									  ->all();
									  
		$asignaturas = ArrayHelper::map( $asignaturasData, 'id', 'descripcion' );
		
		echo json_encode( $asignaturas );
	}

    /**
     * Lists all AsignaturasNivelesSedes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AsignaturasNivelesSedesBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AsignaturasNivelesSedes model.
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
     * Creates a new AsignaturasNivelesSedes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AsignaturasNivelesSedes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AsignaturasNivelesSedes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		
		$idSedesNiveles = SedesNiveles::find()->where('id='.$model->id_sedes_niveles)->all();
		$idSedes = ArrayHelper::getColumn($idSedesNiveles, 'id_sedes' );
		$idNiveles = ArrayHelper::getColumn($idSedesNiveles, 'id_niveles' );
		$idSedes=$idSedes[0];
		$idNiveles = $idNiveles[0];		
		$idAsignaturas = $model->id_asignaturas;
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
			'idSedes' =>$idSedes,
			'idNiveles'=>$idNiveles,
			'idAsignaturas'=>$idAsignaturas,
        ]);
    }

    /**
     * Deletes an existing AsignaturasNivelesSedes model.
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
     * Finds the AsignaturasNivelesSedes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AsignaturasNivelesSedes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AsignaturasNivelesSedes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
