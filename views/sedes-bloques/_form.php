<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SedesBloques */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sedes-bloques-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sedes')->textInput() ?>

    <?= $form->field($model, 'id_bloques')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
