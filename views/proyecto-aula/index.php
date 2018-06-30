<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProyectoAulaBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyecto Aulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyecto-aula-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_grupo',
            'nombre_proyecto',
            'id_jornada',
            'id_persona_coordinador',
            'correo',
            //'celular',
            //'descripcion',
            //'avance_1',
            //'avance_2',
            //'avance_3',
            //'avance_4',
            //'Id_sede',
            //'id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
