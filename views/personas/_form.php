<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipoDocumento')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput() ?>

    <?= $form->field($model, 'Dir')->textInput() ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
