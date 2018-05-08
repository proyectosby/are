<?php

namespace app\controllers;

use Yii;
use app\models\PoblarTabla;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

use yii\base\ErrorException;
use yii\db\Exception;

class PoblarTablaController extends Controller
{

    public function actionCreate()
    {
		$model = new PoblarTabla();
		
		$msg = [];
		
		if( $model->load(Yii::$app->request->post()) )
		{
			// var_dump( Yii::$app->getDb() ); exit();
		
			$connection = Yii::$app->getDb();
			
			$file = UploadedFile::getInstance( $model, "archivo" );
					
			if( $file )
			{
				try
				{
					
					// var_dump( $file );
					$sql = "COPY ".$model->tabla." FROM '".$file->tempName."' WITH csv DELIMITER ',';";
					
					$command = $connection->createCommand($sql);
					
					$result = $command->execute();
					
					// var_dump( $result );
					
					$msg = $result;
					$msg = [ 0 => 0, 1 => "Datos guardados correctamente" ];
				}
				catch ( Exception $e )
				{
					$msg = $e;
					$msg = [ 0 => 1 , 1 => $e->errorInfo[2] ];
				}
			}
		}
		
		return $this->redirect(['index',
			'msg' 	=> $msg,
		]);
		
    }
	
	public function actionIndex( array $msg = [] )
    {
		$connection = Yii::$app->getDb();
		
		$sql = "SELECT tablename FROM pg_tables WHERE schemaname = 'public';";
		
		$command = $connection->createCommand($sql);
					
		$result = $command->queryAll();

		$tablas = [];
		foreach( $result as $key => $value )
		{
			$tablas[$value['tablename']] = $value['tablename'];
		}
		
		$model = new PoblarTabla();
		
        return $this->render('index',[
			'model' => $model,
			'tablas'=> $tablas,
			'msg'	=> $msg,
		]);
    }
}