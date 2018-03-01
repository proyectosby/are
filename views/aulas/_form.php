<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Aulas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aulas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capacidad')->textInput() ?>

    <?= $form->field($model, 'id_sedes')->dropDownList( $sedes, [ 'prompt' => 'Seleccione...'] ) ?>

    <?= $form->field($model, 'id_tipos_aulas')->dropDownList( $tiposAulas, [ 'prompt' => 'Seleccione...' ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
