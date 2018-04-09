<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecursosInfraestructuraFisica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recursos-infraestructura-fisica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cantidad_aulas_regulares')->textInput() ?>

    <?= $form->field($model, 'cantidad_aulas_multiples')->textInput() ?>

    <?= $form->field($model, 'cantidad_oficinas_admin')->textInput() ?>

    <?= $form->field($model, 'cantidad_aulas_profesores')->textInput() ?>

    <?= $form->field($model, 'cantidad_espacios_deportivos')->textInput() ?>

    <?= $form->field($model, 'cantidad_baterias_sanitarias')->textInput() ?>

    <?= $form->field($model, 'cantidad_laboratorios')->textInput() ?>

    <?= $form->field($model, 'cantidad_portatiles')->textInput() ?>

    <?= $form->field($model, 'cantidad_computadores')->textInput() ?>

    <?= $form->field($model, 'cantidad_tabletas')->textInput() ?>

    <?= $form->field($model, 'cantidad_bibliotecas_salas_lectura')->textInput() ?>

    <?= $form->field($model, 'programas_informaticos_admin')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
