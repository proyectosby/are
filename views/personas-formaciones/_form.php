<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonasFormaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-formaciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_personas')->textInput() ?>

    <?= $form->field($model, 'id_tipos_formaciones')->textInput() ?>

    <?= $form->field($model, 'horas_curso')->textInput() ?>

    <?= $form->field($model, 'ano_curso')->textInput() ?>

    <?= $form->field($model, 'titulacion')->checkbox() ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'institucion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
