<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InstrumentoPoblacionEstudiantesBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instrumento Poblacion Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instrumento-poblacion-estudiantes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Instrumento Poblacion Estudiantes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_institucion',
            'id_sede',
            'id_persona_estudiante',
            'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
