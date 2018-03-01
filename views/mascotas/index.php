<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mascotas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mascotas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Mascotas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'animal',
            'nombre',
            'raza',
            'edad',
            //'genero',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
