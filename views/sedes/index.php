<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sedes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sedes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descripcion',
            'telefonos',
            'direccion',
            'area',
            //'id_instituciones',
            //'latitud',
            //'longitud',
            //'id_zonificaciones',
            //'id_tenencias',
            //'id_modalidades',
            //'id_municipios',
            //'id_generos_sedes',
            //'id_calendarios',
            //'id_estratos',
            //'id_barrios_veredas',
            //'codigo_dane',
            //'sede_principal',
            //'comuna',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
