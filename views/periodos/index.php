<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeridosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Periodos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Periodos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descripcion',
            'estado',
            'fecha_inicio',
            'fecha_fin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
