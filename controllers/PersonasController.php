<?php

namespace app\controllers;

use Yii;
use app\models\Personas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use app\models\TiposIdentificaciones;
use app\models\EstadosCiviles;
use app\models\Generos;
use app\models\Estados;
use app\models\Municipios;
use app\models\BarriosVeredas;
use yii\helpers\ArrayHelper;

/**
 * PersonasController implements the CRUD actions for Personas model.
 */
class PersonasController extends Controller
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
     * Lists all Personas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Personas::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personas model.
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
     * Creates a new Personas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //se crea una instancia del modelo tipoIdentificaciones
		$identificacionesTable 		 	= new TiposIdentificaciones();
		//se traen los datos de identificaciones
		$dataIdentificaciones		 	= $identificacionesTable->find()->all();
		//se guardan los datos en un array
		$identificaciones	 	 	 	= ArrayHelper::map( $dataIdentificaciones, 'id', 'descripcion' );
		
		
		//se crea una instancia del modelo estados civiles
		$estadosCivilesTable 		 	= new EstadosCiviles();
		//se traen los datos de identificaciones
		$dataestadosCiviles		 	= $estadosCivilesTable->find()->all();
		//se guardan los datos en un array
		$estadosCiviles	 	 	 	= ArrayHelper::map( $dataestadosCiviles, 'id', 'descripcion' );
		
		
		//se crea una instancia del modelo generos
		$generosTable 		 	= new Generos();
		//se traen los datos de generos
		$datageneros		 	= $generosTable->find()->all();
		//se guardan los datos en un array
		$generos	 	 	 	= ArrayHelper::map( $datageneros, 'id', 'descripcion' );
		
		//se crea una instancia del modelo estados
		$estadosTable 		 	= new Estados();
		//se traen los datos de estados
		$dataestados		 	= $estadosTable->find()->all();
		//se guardan los datos en un array
		$estados	 	 	 	= ArrayHelper::map( $dataestados, 'id', 'descripcion' );
		
		//se crea una instancia del modelo municipios
		$municipiosTable 		 	= new Municipios();
		//se traen los datos de municipios
		$datamunicipios		 	= $municipiosTable->find()->all();
		//se guardan los datos en un array
		$municipios	 	 	 	= ArrayHelper::map( $datamunicipios, 'id', 'descripcion' );
		
		//se crea una instancia del modelo barriosVeredas
		$barriosVeredasTable 		 	= new BarriosVeredas();
		//se traen los datos de barriosVeredas
		$databarriosVeredas		 	= $barriosVeredasTable->find()->all();
		//se guardan los datos en un array
		$barriosVeredas	 	 	 	= ArrayHelper::map( $databarriosVeredas, 'id', 'descripcion' );
		
		$model = new Personas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
			'identificaciones'=>$identificaciones,
			'estadosCiviles'=>$estadosCiviles,
			'generos'=>$generos,
			'estados'=>$estados,
			'municipios'=>$municipios,
			'barriosVeredas'=>$barriosVeredas,
        ]);
    }

    /**
     * Updates an existing Personas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        
		//se crea una instancia del modelo tipoIdentificaciones
		$identificacionesTable 		 	= new TiposIdentificaciones();
		//se traen los datos de identificaciones
		$dataIdentificaciones		 	= $identificacionesTable->find()->all();
		//se guardan los datos en un array
		$identificaciones	 	 	 	= ArrayHelper::map( $dataIdentificaciones, 'id', 'descripcion' );
		
		
		//se crea una instancia del modelo estados civiles
		$estadosCivilesTable 		 	= new EstadosCiviles();
		//se traen los datos de estadosCiviles
		$dataestadosCiviles		 	= $estadosCivilesTable->find()->all();
		//se guardan los datos en un array
		$estadosCiviles	 	 	 	= ArrayHelper::map( $dataEstadosCiviles, 'id', 'descripcion' );
		
		//se crea una instancia del modelo generos
		$generosTable 		 	= new Generos();
		//se traen los datos de estadosCiviles
		$datageneros		 	= $generosTable->find()->all();
		//se guardan los datos en un array
		$generos	 	 	 	= ArrayHelper::map( $datageneros, 'id', 'descripcion' );
		
		//se crea una instancia del modelo estados
		$estadosTable 		 	= new Estados();
		//se traen los datos de estadosCiviles
		$dataestados		 	= $estadosTable->find()->all();
		//se guardan los datos en un array
		$estados	 	 	 	= ArrayHelper::map( $dataestados, 'id', 'descripcion' );
		
		
		$model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Personas model.
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
     * Finds the Personas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Personas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Personas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
