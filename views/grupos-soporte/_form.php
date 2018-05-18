<?php
/**********
Versión: 001
Fecha: Fecha en formato (13-04-2018)
Desarrollador: Viviana Rodas
Descripción: Formulario grupos soporte
---------------------------------------
*******/

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\GruposSoporte */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="grupos-soporte-form"> 

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_tipo_grupos')->dropDownList($tipoGruposSoporte, ['prompt'=>'Seleccione...']) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true,'placeholder'=> 'Digite la descripción']) ?>

    <?= $form->field($model, 'id_sede')->dropDownList($sedes) ?>

    <?= $form->field($model, 'id_jornada_sede')->dropDownList($sedesJornadas, ['prompt'=>'Seleccione...']) ?>

    <?= $form->field($model, 'edad_minima')->textInput() ?>

    <?= $form->field($model, 'edad_maxima')->textInput() ?>

    <?= $form->field($model, 'cantidad_participantes')->textInput() ?>

    <?= $form->field($model, 'id_docentes')->dropDownList($docentes, ['prompt'=>'Seleccione...']) ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'estado')->dropDownList($estados, ['prompt'=>'Seleccione...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
