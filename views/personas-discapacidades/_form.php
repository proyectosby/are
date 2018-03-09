<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonasDiscapacidades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-discapacidades-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_personas')->textInput() ?>

    <?= $form->field($model, 'id_tipos_discapacidades')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
