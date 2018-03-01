<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mascotas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mascotas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'animal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'raza')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edad')->textInput() ?>

    <?= $form->field($model, 'genero')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
