<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectoAula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyecto-aula-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_grupo')->textInput() ?>

    <?= $form->field($model, 'nombre_proyecto')->textInput() ?>

    <?= $form->field($model, 'id_jornada')->textInput() ?>

    <?= $form->field($model, 'id_persona_coordinador')->textInput() ?>

    <?= $form->field($model, 'correo')->textInput() ?>

    <?= $form->field($model, 'celular')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'avance_1')->textInput() ?>

    <?= $form->field($model, 'avance_2')->textInput() ?>

    <?= $form->field($model, 'avance_3')->textInput() ?>

    <?= $form->field($model, 'avance_4')->textInput() ?>

    <?= $form->field($model, 'Id_sede')->textInput(['value' => $_SESSION['sede'][0] ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
