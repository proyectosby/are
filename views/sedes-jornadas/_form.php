<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SedesJornadas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sedes-jornadas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_jornadas')->dropDownList( $jornadas, ['prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, 'id_sedes')->dropDownList( $sedes, ['prompt' => 'Seleccione...' ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
