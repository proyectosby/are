<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProyectosPedagogicosTransversalesBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyectos Pedagogicos Transversales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyectos-pedagogicos-transversales-index">

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

            'id',
            'codigo_grupo',
            'nombre_grupo',
            'coordinador',
            'area',
            //'correo',
            //'celular',
            //'linea_investigacion_1',
            //'linea_investigacion_2',
            //'linea_investigacion_3',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
