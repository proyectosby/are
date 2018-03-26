<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RepresentantesLegales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="representantes-legales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_perfiles_x_personas')->textInput() ?>

    <?= $form->field($model, 'id_personas')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
