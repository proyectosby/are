<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Estados;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Periodos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'descripcion',
            [
				'attribute'=>'estado',
				'value' => function( $model )
				{
					$estados = Estados::findOne($model->estado);
					return $estados ? $estados->descripcion : '';
				},
				
			], 

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
