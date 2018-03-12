<?php

/**********
Versión: 001
Fecha: 12-03-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de Asignaturas
---------------------------------------
Modificaciones:
Fecha: 12-03-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - se incorcopar el buscar
---------------------------------------
**********/

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Estados;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Periodos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodos-index">

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
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
