<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PlanDeAulaBuscar */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-de-aula-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_periodo') ?>

    <?= $form->field($model, 'id_nivel') ?>

    <?= $form->field($model, 'id_asignatura') ?>

    <?= $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'actividad') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'evaluativa')->checkbox() ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'id_perfiles_x_personas_docentes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
