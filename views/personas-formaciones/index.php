<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonasFormacionesBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas Formaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-formaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Personas Formaciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_personas',
            'id_tipos_formaciones',
            'horas_curso',
            'ano_curso',
            'titulacion:boolean',
            //'titulo',
            //'institucion',
            //'id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
