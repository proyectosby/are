<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Instituciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="instituciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tipos_instituciones')->dropDownList( $tipoInstituciones, [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, 'id_sectores')->dropDownList( $sectores, [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, 'nit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropDownList( $estados ) ?> 

    <?= $form->field($model, 'caracter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'especialidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contacto_rector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo_electronico_institucional')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pagina_web')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigo_dane')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
