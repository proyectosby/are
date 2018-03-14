<?php
/**********
Versión: 001
Fecha: 13-03-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de RangosCalificacion
---------------------------------------
Modificaciones:
Fecha: 13-03-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - Se cambian campos a dropDownList para que muestren la lista correspondiente al campo
---------------------------------------
**********/
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RangosCalificacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rangos-calificacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'valor_minimo')->textInput() ?>

    <?= $form->field($model, 'valor_maximo')->textInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_tipo_calificacion')->dropDownList($TiposCalificacion,['prompt' => 'Seleccione...' ]) ?>

    <?= $form->field($model, 'id_instituciones')->dropDownList($institucionNombre) ?>

    <?= $form->field($model, 'estado')->dropDownList($estados) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
