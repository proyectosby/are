<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SancionesEstudiantes */

$this->title = 'Update Sanciones Estudiantes: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Sanciones Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sanciones-estudiantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
