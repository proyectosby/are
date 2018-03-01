<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Sedes;
use app\models\TiposAulas;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aulas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Aulas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descripcion',
            'capacidad',
           [
				'attribute' => 'id_sedes',
				'value' => function( $model ){
					$sedes = Sedes::findOne($model->id_sedes);
					return $sedes ? $sedes->descripcion : '';
				},
				'filter' => ArrayHelper::map(Sedes::find()->all(), 'id', 'descripcion' ),
			],
			[
				'attribute' => 'id_tipos_aulas',
				'value' => function( $model ){
					$tiposAulas = TiposAulas::findOne($model->id_tipos_aulas);
					return $tiposAulas ? $tiposAulas->descripcion : '';
				},
				'filter' => ArrayHelper::map(Sedes::find()->all(), 'id', 'descripcion' ),
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
