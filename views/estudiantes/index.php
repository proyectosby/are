<?php

use yii\helpers\Html;
use yii\grid\GridView;



/* @var $this yii\web\View */
/* @var $searchModel app\models\EstudiantesBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\Sedes;
use	yii\helpers\ArrayHelper;
$nombreSede = new Sedes();
$nombreSede = $nombreSede->find()->where('id='.$idSedes)->all();
$nombreSede = ArrayHelper::map($nombreSede,'id','descripcion');
$nombreSede = $nombreSede[$idSedes];

$this->title = 'Matricular Estudiante';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiantes-index">

    <h1><?= Html::encode($nombreSede) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?= Html::a('Agregar', [
									'create',
									'idSedes' 		=> $idSedes,
									'idInstitucion' => $idInstitucion, 
								], 
								['class' => 'btn btn-success'
		]) ?>

    </p>
	
	
    <?php 
	echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			[
				'attribute'=>'id_perfiles_x_personas',
				'value' => function( $model )
				{
					/**
					* Llenar nombre del docente
					*/
					//variable con la conexion a la base de datos 
					$connection = Yii::$app->getDb();
					$command = $connection->createCommand("
					SELECT es.id_perfiles_x_personas, concat(pe.nombres,' ',pe.apellidos) as nombres
					FROM public.estudiantes as es, public.perfiles_x_personas as pp, public.personas as pe
					where es.id_perfiles_x_personas = pp.id
					and pp.id_personas = pe.id
					and es.id_perfiles_x_personas =$model->id_perfiles_x_personas
					");
					$result = $command->queryAll();
					
					return $result[0]['nombres'];
				},
				
			],
			
			[
				'attribute'=>'id_paralelos',
				'value' => function( $model )
				{
					$paralelos = $model->paralelos;
					return $paralelos ? $paralelos->descripcion : '';
				}, //para buscar por el nombre
				
			],
			

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
