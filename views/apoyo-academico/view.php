<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ApoyoAcademico */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Apoyo Academicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apoyo-academico-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'id_persona_doctor',
            'registro',
            'id_persona_estudiante',
            'motivo_consulta',
            'fecha_entrada',
            'hora_entrada',
            'fecha_salida',
            'hora_salida',
            'incapacidad:boolean',
            'no_dias_incapaciad',
            'discapacidad:boolean',
            'observaciones',
            'id_sede',
            'id_tipo_apoyo',
            'estado',
        ],
    ]) ?>

</div>
