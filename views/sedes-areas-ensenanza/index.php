<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Sedes;
use app\models\AreasEnsenanza;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SedesAreasEnsenanzaBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Áreas de Ensenanzas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sedes-areas-ensenanza-index">

    <h1><?= Html::encode( $modelInstitucion->descripcion ) ?></h1>
    <h3><?= Html::encode( "SEDE ".$modelSedes->descripcion ) ?></h3>
	
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar', ['create', 'idSedes' => $modelSedes->id ], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

			// [
				// 'attribute' => 'id_sedes',
				// 'value' 	=> function( $model ){
									// $sedes = Sedes::findOne($model->id_sedes);
									// return $sedes ? $sedes->descripcion : '';
							   // },
				// 'filter' 	=> ArrayHelper::map(Sedes::find()->all(), 'id', 'descripcion' ),
			// ],
   			[
				'attribute' => 'id_areas_ensenanza',
				'value' 	=> function( $model ){
									$sedes = AreasEnsenanza::findOne($model->id_areas_ensenanza);
									return $sedes ? $sedes->descripcion : '';
							   },
				'filter' 	=> ArrayHelper::map(AreasEnsenanza::find()->all(), 'id', 'descripcion' ),
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
