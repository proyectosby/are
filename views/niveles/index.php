<?php

use yii\helpers\Html;
use yii\grid\GridView;
use	yii\helpers\ArrayHelper;

use app\models\NivelesAcademicos;
use app\models\Niveles;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Niveles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="niveles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'descripcion',
            [
				'attribute'=>'id_niveles_academicos',
				'value' => function( $model )
				{
					$NivelesAcademicos = NivelesAcademicos::findOne($model->id_niveles_academicos);
					return $NivelesAcademicos ? $NivelesAcademicos->descripcion : '';
				},
				'filter' 	=> ArrayHelper::map(NivelesAcademicos::find()->all(), 'id', 'descripcion' ),
				
			],            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
