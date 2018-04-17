<?php

namespace app\controllers;

use Yii;
use app\models\Documentos;
use app\models\DocumentosBuscar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use app\models\Personas;
use app\models\Estados;

/**
 * DocumentosController implements the CRUD actions for Documentos model.
 */
class DocumentosController extends Controller
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
     * Lists all Documentos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DocumentosBuscar();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Documentos model.
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
     * Creates a new Documentos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Documentos();
		
		
		$dataPersonas = Personas::find()->select( "id, ( nombres || ' ' || apellidos ) as nombres, identificacion " )->where( 'estado=1' )->all();
		$personas 	  = ArrayHelper::map( $dataPersonas, 'id', 'nombres' );
		
		$dataEstados  = Estados::find()->where( 'id=1' )->all();
		$estados 	  = ArrayHelper::map( $dataEstados, 'id', 'descripcion' );
        
		if ($model->load(Yii::$app->request->post())) {
			
			$file = UploadedFile::getInstanceByName('file');			
			
			if( $file ){
				
				$persona = Personas::findOne( $model->id_persona );
				
				//Si no existe la carpeta se crea
				$carpeta = "../documentos/documentosInteresDocentes/".$persona->identificacion;
				if (!file_exists($carpeta)) {
					mkdir($carpeta, 0777, true);
				}
				
				$rutaFisicaDirectoriaUploads  = "../documentos/documentosInteresDocentes/".$persona->identificacion."/";
				$rutaFisicaDirectoriaUploads .= $file->baseName;
				$rutaFisicaDirectoriaUploads .= date( "_Y_m_d_His" ) . '.' . $file->extension;
				
				$file->saveAs( $rutaFisicaDirectoriaUploads );//$file->baseName puede ser cambiado por el nombre que quieran darle al archivo en el servidor.
				
				$model->ruta = $rutaFisicaDirectoriaUploads;
				
				if( $model->save() )
					return $this->redirect(['view', 'id' => $model->id]);
			}
        }

        return $this->render('create', [
            'model' 		 => $model,
            'tiposDocumento' => [ 'Diplomado en licenciatura escolar', 'Certificado congreso de maestros', 'Maestría en ciencias básicas' ],
            'personas' 		 => $personas,
            'estados' 		 => $estados,
        ]);
    }

    /**
     * Updates an existing Documentos model.
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
     * Deletes an existing Documentos model.
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
     * Finds the Documentos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Documentos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Documentos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
