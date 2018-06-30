<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectoAula */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Proyecto Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyecto-aula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_grupo',
            'nombre_proyecto',
            'id_jornada',
            'id_persona_coordinador',
            'correo',
            'celular',
            'descripcion',
            'avance_1',
            'avance_2',
            'avance_3',
            'avance_4',
            'Id_sede',
            'id',
        ],
    ]) ?>

</div>
