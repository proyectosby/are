<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Paralelos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paralelos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_sedes_jornadas')->textInput() ?>

    <?= $form->field($model, 'id_sedes_niveles')->textInput() ?>

    <?= $form->field($model, 'ano_lectivo')->textInput() ?>

    <?= $form->field($model, 'fecha_ingreso')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
