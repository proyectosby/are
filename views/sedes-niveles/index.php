<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\ArrayHelper;

use app\models\Sedes;
use app\models\Niveles;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SedesNivelesBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Niveles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sedes-niveles-index">

    <h1><?= Html::encode($modelInstitucion->descripcion) ?></h1>
    <h3><?= Html::encode( "SEDE ". $modelSedes->descripcion) ?></h1>
	
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

			[
				'attribute' => 'id_niveles',
				'value' 	=> function( $model ){
					$niveles = Niveles::findOne($model->id_niveles);
					return $niveles ? $niveles->descripcion : '';
				},
				'filter' => ArrayHelper::map(Niveles::find()->all(), 'id', 'descripcion' ),
			],
			// [
				// 'attribute' => 'id_sedes',
				// 'value' 	=> function( $model ){
					// $sedes = Sedes::findOne($model->id_sedes);
					// return $sedes ? $sedes->descripcion : '';
				// },
				// 'filter' => ArrayHelper::map(Sedes::find()->all(), 'id', 'descripcion' ),
			// ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
