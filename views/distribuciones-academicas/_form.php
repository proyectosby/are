<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DistribucionesAcademicas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distribuciones-academicas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_asignaturas_x_niveles_sedes')->textInput() ?>

    <?= $form->field($model, 'id_perfiles_x_personas_docentes')->textInput() ?>

    <?= $form->field($model, 'id_aulas_x_sedes')->textInput() ?>

    <?= $form->field($model, 'fecha_ingreso')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
