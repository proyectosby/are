<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Jornadas;
use app\models\Niveles;
use app\models\Sedes;
use app\models\SedesJornadas;
/* @var $this yii\web\View */
/* @var $model app\models\Paralelos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paralelos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_sedes_jornadas')->textInput(['maxlength' => true]) ?>
    
	<!-- <?= $form->field($model, 'id_sedes_jornadas')->dropDownList($jornadas, [ 'prompt' => 'Seleccione...']) ?> -->

    <?= $form->field($model, 'id_sedes_niveles')->dropDownList($niveles, [ 'prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'ano_lectivo')->textInput() ?>

    <?= $form->field($model, 'fecha_ingreso')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
