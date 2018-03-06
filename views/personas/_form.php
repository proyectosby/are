<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-form">

    <?php $form = ActiveForm::begin(); ?>
	
	
		<fieldset>
		<legend align="right">Datos generales</legend>
		
		<?= $form->field($model, 'identificacion')->textInput(['maxlength' => true]) ?>
		
		<?= $form->field($model, 'id_tipos_identificaciones')->textInput() ?>

		<?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'fecha_nacimiento')->textInput() ?>
		
		<?= $form->field($model, 'id_estados_civiles')->textInput() ?>

		<?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'id_generos')->textInput() ?>
		
		<?= $form->field($model, 'telefonos')->textInput(['maxlength' => true]) ?>
		
		<?= $form->field($model, 'envio_correo')->checkbox() ?>
		
		<?= $form->field($model, 'estado')->textInput() ?>

		</fieldset>
	<br>
	
	<fieldset>
	<legend align="right">Datos de acceso</legend>
	<?= $form->field($model, 'usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'psw')->textInput(['maxlength' => true]) ?>
	
	</fieldset>
	<br>
	
	<fieldset>
	<legend align="right">Ubicación</legend>
	
	<?= $form->field($model, 'id_municipios')->textInput() ?>
	
	<?= $form->field($model, 'id_barrios_veredas')->textInput() ?>

	<?= $form->field($model, 'latitud')->textInput() ?>

    <?= $form->field($model, 'longitud')->textInput() ?>
	
    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>
	</fieldset>
	<br>
    
	<fieldset>
	<legend align="right">Hobbies</legend>
	 
	 <?= $form->field($model, 'hobbies')->textInput(['maxlength' => true]) ?>
	
	</fieldset>
	<br>
	
    <?= $form->field($model, 'fecha_ultimo_ingreso')->textInput() ?>

    <?= $form->field($model, 'fecha_registro')->textInput() ?>

   

  

    

   

   

   

    

    

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
