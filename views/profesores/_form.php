<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profesores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profesores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'tipoDocumento')->textInput() ?>

    <?= $form->field($model, 'nroDocumento')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <?= $form->field($model, 'fechaDeNacimiento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
