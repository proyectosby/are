<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DistribucionesAcademicas */

$this->title = 'Update Distribuciones Academicas: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Distribuciones Academicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="distribuciones-academicas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
