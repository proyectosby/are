<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PersonasEscolaridades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-escolaridades-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_personas')->textInput() ?>

    <?= $form->field($model, 'id_escolaridades')->textInput() ?>

    <?= $form->field($model, 'ultimo_nivel_cursado')->textInput() ?>

    <?= $form->field($model, 'ano_curso')->textInput() ?>

    <?= $form->field($model, 'titulacion')->checkbox() ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'institucion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
