<?php
/**********
Versión: 001
Fecha: 16-04-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de Apoyo Academico
---------------------------------------
Modificaciones:
Fecha: 16-04-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - se renombran los labels del boton
se organizan alguno campos para que muestren los valores respentivo en lugar de los id
---------------------------------------
Modificaciones:
Fecha: 16-04-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - se importa el js y se habilita el campo de incapacidad con su check box
---------------------------------------
**********/

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/apoyoAcademico.js',['depends' => [\yii\web\JqueryAsset::className()]]);

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\ApoyoAcademico */
/* @var $form yii\widgets\ActiveForm */
use dosamigos\datepicker\DatePicker;
use app\models\Estados;
use app\models\TiposApoyoAcademico;
use	yii\helpers\ArrayHelper;


//se envia la variable estados con los valores de la tabla estado, siempre es activo
$estados = new Estados();
$estados = $estados->find()->where('id=1')->all();
$estados = ArrayHelper::map($estados,'id','descripcion');

$apoyoAcademico = new TiposApoyoAcademico();
$apoyoAcademico = $apoyoAcademico->find()->all();
$apoyoAcademico = ArrayHelper::map($apoyoAcademico,'id','descripcion');

?>

<div class="apoyo-academico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_persona_doctor')->DropDownList($doctores,['prompt'=>'Seleccione...']) ?>

    <?= $form->field($model, 'registro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_persona_estudiante')->DropDownList($estudiantes,['prompt'=>'Seleccione...']) ?>

    <?= $form->field($model, 'motivo_consulta')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'fecha_entrada')->widget(
		DatePicker::className(), [
			
				 // modify template for custom rendering
				'template' 		=> '{addon}{input}',
				'language' 		=> 'es',
				'clientOptions' => 
				[
					'autoclose' 	=> true,
					'format' 		=> 'yyyy-mm-dd',
				]
	]);?> 
	
	<?php 
	
	echo $form->field($model, 'hora_entrada')->widget(TimePicker::classname(), [
		'options' => 
		[
			'readonly' => true,
			'showMeridian'=>false,
			'value'=>$model->hora_entrada,
			
		]]);?>
	
	<?= $form->field($model, 'fecha_salida')->widget(
		DatePicker::className(), [
			
				 // modify template for custom rendering
				'template' 		=> '{addon}{input}',
				'language' 		=> 'es',
				'clientOptions' => [
				'autoclose' 	=> true,
				'format' 		=> 'yyyy-mm-dd',
			]
	]);?> 	

   
	<?php echo $form->field($model, 'hora_salida')->widget(TimePicker::classname(), [
		'options' => 
		[
			'readonly' => true,
			'showMeridian'=>true,
			'value'=>$model->hora_salida
		]]);?>
    <?= $form->field($model, 'incapacidad')->checkbox() ?>

    <?= $form->field($model, 'no_dias_incapaciad')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'discapacidad')->checkbox() ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'id_sede')->hiddenInput(['value' => $idSedes])->label(false) ?>

    <?= $form->field($model, 'id_tipo_apoyo')->hiddenInput(['value' => $AAcademico])->label(false) ?>

    <?= $form->field($model, 'estado')->DropDownList($estados) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
