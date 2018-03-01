<?php

namespace app\controllers;

use Yii;
use app\models\Sedes;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\BarriosVeredas;
use app\models\Calendarios;
use app\models\Estados;
use app\models\Estratos;
use app\models\GenerosSedes;
use app\models\Instituciones;
use app\models\Modalidades;
use app\models\Tenencias;
use app\models\Zonificaciones;
use yii\helpers\ArrayHelper;

/**
 * SedesController implements the CRUD actions for Sedes model.
 */
class SedesController extends Controller
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
     * Lists all Sedes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Sedes::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sedes model.
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
     * Creates a new Sedes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		
		$barriosVeredasTable = new BarriosVeredas();
		$dataBarriosVeredas	 = $barriosVeredasTable->find()->where('estado=1')->orderby('descripcion')->all();
		$barriosVeredas		 = ArrayHelper::map( $dataBarriosVeredas, 'id', 'descripcion' );
		
		$calendariosTable 	 = new Calendarios();
		$dataCalendarios	 = $calendariosTable->find()->orderby('descripcion')->all();
		$calendarios		 = ArrayHelper::map( $dataCalendarios, 'id', 'descripcion' );
		
		$estratosTable		 = new Estratos();
		$dataEstratos		 = $estratosTable->find()->orderby('descripcion')->where('estado=1')->all();
		$estratos			 = ArrayHelper::map( $dataEstratos, 'id', 'descripcion' );
		
		$generosSedesTable	 = new GenerosSedes();
		$dataGenerosSede	 = $generosSedesTable->find()->orderby('descripcion')->all();
		$generosSedes		 = ArrayHelper::map( $dataGenerosSede, 'id', 'descripcion' );
		
		$institucionesTable	 = new Instituciones();
		$dataInstituciones	 = $institucionesTable->find()->orderby('descripcion')->where('estado=1')->all();
		$instituciones		 = ArrayHelper::map( $dataInstituciones, 'id', 'descripcion' );
		
		$modalidadesTable	 = new Modalidades();
		$dataModalidades	 = $modalidadesTable->find()->orderby('descripcion')->where('estado=1')->all();
		$modalidades		 = ArrayHelper::map( $dataModalidades, 'id', 'descripcion' );
		
		$tenenciasTable	 	 = new Tenencias();
		$dataTenencias 		 = $tenenciasTable->find()->orderby('descripcion')->where('estado=1')->all();
		$tenencias		 	 = ArrayHelper::map( $dataTenencias, 'id', 'descripcion' );
		
		$zonificacionesTable = new Zonificaciones();
		$dataZonificaciones	 = $zonificacionesTable->find()->orderby('descripcion')->where('estado=1')->all();
		$zonificaciones	 	 = ArrayHelper::map( $dataZonificaciones, 'id', 'descripcion' );
		
		$estadosTable 		 = new Estados();
		$dataEstados		 = $estadosTable->find()->orderby('descripcion')->where( 'id=1' )->all();
		$estados	 	 	 = ArrayHelper::map( $dataEstados, 'id', 'descripcion' );
		
		$model = new Sedes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' 		 => $model,
            'barriosVeredas' => $barriosVeredas,
            'calendarios' 	 => $calendarios,
            'estratos' 	 	 => $estratos,
            'generosSedes' 	 => $generosSedes,
            'instituciones'	 => $instituciones,
            'modalidades'	 => $modalidades,
            'tenencias'	 	 => $tenencias,
            'zonificaciones' => $zonificaciones,
            'estados' 		 => $estados,
        ]);
    }

    /**
     * Updates an existing Sedes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		
		$barriosVeredasTable = new BarriosVeredas();
		$dataBarriosVeredas	 = $barriosVeredasTable->find()->where('estado=1')->orderby('descripcion')->all();
		$barriosVeredas		 = ArrayHelper::map( $dataBarriosVeredas, 'id', 'descripcion' );
		
		$calendariosTable 	 = new Calendarios();
		$dataCalendarios	 = $calendariosTable->find()->orderby('descripcion')->all();
		$calendarios		 = ArrayHelper::map( $dataCalendarios, 'id', 'descripcion' );
		
		$estratosTable		 = new Estratos();
		$dataEstratos		 = $estratosTable->find()->orderby('descripcion')->where('estado=1')->all();
		$estratos			 = ArrayHelper::map( $dataEstratos, 'id', 'descripcion' );
		
		$generosSedesTable	 = new GenerosSedes();
		$dataGenerosSede	 = $generosSedesTable->find()->orderby('descripcion')->all();
		$generosSedes		 = ArrayHelper::map( $dataGenerosSede, 'id', 'descripcion' );
		
		$institucionesTable	 = new Instituciones();
		$dataInstituciones	 = $institucionesTable->find()->orderby('descripcion')->where('estado=1')->all();
		$instituciones		 = ArrayHelper::map( $dataInstituciones, 'id', 'descripcion' );
		
		$modalidadesTable	 = new Modalidades();
		$dataModalidades	 = $modalidadesTable->find()->orderby('descripcion')->where('estado=1')->all();
		$modalidades		 = ArrayHelper::map( $dataModalidades, 'id', 'descripcion' );
		
		$tenenciasTable	 	 = new Tenencias();
		$dataTenencias 		 = $tenenciasTable->find()->orderby('descripcion')->where('estado=1')->all();
		$tenencias		 	 = ArrayHelper::map( $dataTenencias, 'id', 'descripcion' );
		
		$zonificacionesTable = new Zonificaciones();
		$dataZonificaciones	 = $zonificacionesTable->find()->orderby('descripcion')->where('estado=1')->all();
		$zonificaciones	 	 = ArrayHelper::map( $dataZonificaciones, 'id', 'descripcion' );
		
		$estadosTable 		 = new Estados();
		$dataEstados		 = $estadosTable->find()->orderby('descripcion')->all();
		$estados	 	 	 = ArrayHelper::map( $dataEstados, 'id', 'descripcion' );
		
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'barriosVeredas' => $barriosVeredas,
            'calendarios' 	 => $calendarios,
            'estratos' 	 	 => $estratos,
            'generosSedes' 	 => $generosSedes,
            'instituciones'	 => $instituciones,
            'modalidades'	 => $modalidades,
            'tenencias'	 	 => $tenencias,
            'zonificaciones' => $zonificaciones,
            'estados' 		 => $estados,
        ]);
    }

    /**
     * Deletes an existing Sedes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        // $this->findModel($id)->delete();
		$model = Sedes::findOne($id);
		$model->estado = 2;
		$model->update(false);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sedes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Sedes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sedes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
