<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonasFormaciones */

$this->title = 'Update Personas Formaciones: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Personas Formaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personas-formaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
