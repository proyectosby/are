<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Bloques;
use app\models\Sedes;
use app\models\Instituciones;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SedesBloquesBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$nombreSede = new Sedes();
$nombreSede = $nombreSede->find()->where('id='.$idSedes)->all();
$nombreSede = ArrayHelper::map($nombreSede,'id','descripcion');
$nombreSede = $nombreSede[$idSedes];

$nombreInstitucion = new Instituciones();
$nombreInstitucion = $nombreInstitucion->find()->where('id='.$idInstitucion)->all();
$nombreInstitucion = ArrayHelper::map($nombreInstitucion,'id','descripcion');
$nombreInstitucion = $nombreInstitucion[$idInstitucion];

$this->title = $nombreInstitucion;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sedes-bloques-index">

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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			[
				'attribute'=>'id_bloques',
				/*
				se consulta el nombre del bloque para mostrar envez del id
				*/
				'value' => function( $model ){
					$bloques = Bloques::findOne($model->id_bloques);
					$bloques = $bloques ? $bloques->descripcion : '';
					return  $bloques ;	
				},
				
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
