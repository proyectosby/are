<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'usuario',
            // 'psw',
            'identificacion',
            'nombres',
            'apellidos',
            //'telefonos',
            //'fecha_nacimiento',
            //'fecha_registro',
            'correo',
            //'domicilio',
            //'fecha_ultimo_ingreso',
            //'envio_correo:boolean',
            //'id_municipios',
            //'id_tipos_identificaciones',
            //'latitud',
            //'longitud',
            //'id_estados_civiles',
            'id_generos',
            //'hobbies',
            //'id_barrios_veredas',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
