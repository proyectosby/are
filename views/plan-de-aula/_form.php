<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\PlanDeAula */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="plan-de-aula-form">

    <?php $form = ActiveForm::begin(); ?>
    
	<?= $form->field($model, 'id_perfiles_x_personas_docentes')->dropDownList( $personas, [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, 'id_periodo')->dropDownList( $periodos, [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, 'id_nivel')->dropDownList( $niveles, [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, 'id_asignatura')->dropDownList( $asignaturas, [ 'prompt' => 'Seleccione...' ] ) ?>

	<?= $form->field($model, 'fecha')->widget(
		DatePicker::className(), [
			
				 // modify template for custom rendering
				'template' 		=> '{addon}{input}',
				'language' 		=> 'es',
				'clientOptions' => [
				'autoclose' 	=> true,
				'format' 		=> 'yyyy-mm-dd',
			]
	]);?> 	 		

    <?= $form->field($model, 'actividad')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese la actividad' ]) ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese las obsrvaciones']) ?>

    <?= $form->field($model, 'evaluativa')->checkbox() ?>

    <?= $form->field($model, 'estado')->dropDownList( $estados ) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
