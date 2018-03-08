<?php

/**********
Versión: 001
Fecha: 07-03-2018
Desarrollador: Edwin Molina Grisales
Descripción: CRUD de sedes-jornadas
---------------------------------------
Modificaciones:
Fecha: 07-03-2018
Persona encargada: Edwin Molina Grisales
Cambios realizados: Se quita la columna ID
----------------
**********/

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jornadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jornadas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'descripcion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
