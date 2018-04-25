<?php
/**********
Versión: 001
Fecha: 25-04-2018
Desarrollador: Maria Viviana Rodas
Descripción: controlador de perfiles persona institucion
---------------------------------------
*/

namespace app\controllers;

use Yii;
use app\models\PerfilesPersonasInstitucion;
use app\models\PerfilesPersonasInstitucionBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;
use app\models\Estados;
use app\models\Perfiles;
use app\models\PerfilesXPersonas;
use app\models\Instituciones;

/**
 * PerfilesPersonasInstitucionController implements the CRUD actions for PerfilesPersonasInstitucion model.
 */
class PerfilesPersonasInstitucionController extends Controller
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
     * Lists all PerfilesPersonasInstitucion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PerfilesPersonasInstitucionBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PerfilesPersonasInstitucion model.
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
     * Creates a new PerfilesPersonasInstitucion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        
		 //se crea una instancia del modelo perfiles
		$perfilesTable 		 	= new Perfiles();
		//se traen los datos de perfiles
		$dataPerfiles		 	= $perfilesTable->find()->where( 'id=1' )->all();
		//se guardan los datos en un array
		$perfiles	 	 	 	= ArrayHelper::map( $dataPerfiles, 'id', 'descripcion' );
		
		//se crea una instancia del modelo instituciones
		$institucionesTable 		 	= new Instituciones();
		//se traen los datos de estados
		$dataInstituciones		 	= $institucionesTable->find()->where( 'id=1' )->all();
		//se guardan los datos en un array
		$instituciones	 	 	 	= ArrayHelper::map( $dataInstituciones, 'id', 'descripcion' );
		
		//Falta perfiles por persona

		//se crea una instancia del modelo estados
		$estadosTable 		 	= new Estados();
		//se traen los datos de estados
		$dataestados		 	= $estadosTable->find()->where( 'id=1' )->all();
		//se guardan los datos en un array
		$estados	 	 	 	= ArrayHelper::map( $dataestados, 'id', 'descripcion' );
		
		
		$model = new PerfilesPersonasInstitucion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'perfilesTable' => $perfilesTable,
            'perfiles' => $perfiles,
            'instituciones' => $instituciones,
            'estados' => $estados,
        ]);
    }

    /**
     * Updates an existing PerfilesPersonasInstitucion model.
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
     * Deletes an existing PerfilesPersonasInstitucion model.
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
     * Finds the PerfilesPersonasInstitucion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PerfilesPersonasInstitucion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PerfilesPersonasInstitucion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
