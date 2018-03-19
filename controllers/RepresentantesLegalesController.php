<?php

namespace app\controllers;

use Yii;
use app\models\PerfilesXPersonas;
use app\models\PerfilesXPersonasBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use app\models\Personas;
use app\models\RepresentantesLegales;
use yii\helpers\ArrayHelper;

/**
 * RepresentantesLegalesController implements the CRUD actions for PerfilesXPersonas model.
 */
class RepresentantesLegalesController extends Controller
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
     * Lists all PerfilesXPersonas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PerfilesXPersonasBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->andWhere( 'id_perfiles=15' );	//15 Es el id del perfil estudiante

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PerfilesXPersonas model.
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
     * Creates a new PerfilesXPersonas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		$personasData 	= Personas::find()
								->select( "id, ( nombres || ' ' || apellidos ) nombres" )
								->where( 'estado=1' )
								->all();
		$personas 		= ArrayHelper::map( $personasData, 'id' , 'nombres' );
		
        $modelRepresentantesLegales = new RepresentantesLegales();
        $model 						= new PerfilesXPersonas();
		$model->id_perfiles = 15;

        if( $model->load(Yii::$app->request->post()) && $model->save() ){
			
			if( $modelRepresentantesLegales->load(Yii::$app->request->post()) ){
				$modelRepresentantesLegales->id_perfiles_x_personas = $model->id;
				if( $modelRepresentantesLegales->save() )
					return $this->redirect(['view', 'id' => $model->id]);
			}
        }

        return $this->render('create', [
            'model' 					=> $model,
            'modelRepresentantesLegales'=> $modelRepresentantesLegales,
            'personas' 					=> $personas,
            'representantesLegales'		=> $personas,
        ]);
    }

    /**
     * Updates an existing PerfilesXPersonas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		
		$personasData 	= Personas::find()
								->select( "id, ( nombres || ' ' || apellidos ) nombres" )
								->where( 'estado=1' )
								->all();
		$representantesLegales	= ArrayHelper::map( $personasData, 'id' , 'nombres' );
		
		
		$modelRepresentantesLegales = RepresentantesLegales::find()->where( 'id_perfiles_x_personas='.$id )->one();
        $model 						= PerfilesXPersonas::findOne( $id );
		$model->id_perfiles = 15;

		$personasData 	= Personas::find()
								->select( "id, ( nombres || ' ' || apellidos ) nombres" )
								->where( 'id='.$model->id_personas )
								->all();
		$personas 		= ArrayHelper::map( $personasData, 'id' , 'nombres' );

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->id]);
        // }
		
		if( $model->load(Yii::$app->request->post()) && $model->save() ){
			
			if( $modelRepresentantesLegales->load(Yii::$app->request->post()) ){
				// var_dump( $modelRepresentantesLegales->id_personas ); exit(9);
				Yii::$app
					->db
					->createCommand()
					->update('representantes_legales', [ 'id_personas' => $modelRepresentantesLegales->id_personas ], 'id_perfiles_x_personas='.$model->id )
					->execute();
				
				
				// $modelRepresentantesLegales->id_personas = $model->id;
				// if( $modelRepresentantesLegales->update(false) )
					return $this->redirect(['view', 'id' => $model->id]);
			}
        }

        return $this->render('update', [
            'model' 					=> $model,
			'modelRepresentantesLegales'=> $modelRepresentantesLegales,
			'personas' 					=> $personas,
			'representantesLegales'		=> $representantesLegales,
        ]);
    }

    /**
     * Deletes an existing PerfilesXPersonas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model 						= $this->findModel($id);
		// $modelRepresentantesLegales = RepresentantesLegales::find()->where( 'id_perfiles_x_personas='.$model->id );
		// // var_dump( $modelRepresentantesLegales ); exit(9);
        // $modelRepresentantesLegales->deleteAll();
		
		//Eliminando los representantes legales
		Yii::$app
			->db
			->createCommand()
			->delete('representantes_legales', ['id_perfiles_x_personas' => $model->id ])
			->execute();
		
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PerfilesXPersonas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return PerfilesXPersonas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PerfilesXPersonas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
