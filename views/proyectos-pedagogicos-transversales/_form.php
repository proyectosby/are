<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectosPedagogicosTransversales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyectos-pedagogicos-transversales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo_grupo')->textInput() ?>

    <?= $form->field($model, 'nombre_grupo')->textInput() ?>

    <?= $form->field($model, 'coordinador')->textInput() ?>

    <?= $form->field($model, 'area')->textInput() ?>

    <?= $form->field($model, 'correo')->textInput() ?>

    <?= $form->field($model, 'celular')->textInput() ?>

    <?= $form->field($model, 'linea_investigacion_1')->textInput() ?>

    <?= $form->field($model, 'linea_investigacion_2')->textInput() ?>

    <?= $form->field($model, 'linea_investigacion_3')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
