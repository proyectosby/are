<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Personas */
/* @var $form yii\widgets\ActiveForm */

	$this->registerJsFile(Yii::$app->request->baseUrl.'/js/personas.js',['depends' => [\yii\web\JqueryAsset::className()]]);
	
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

<div class="personas-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<!-- tabs de boostrarp para orden del formulario-->

	
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" id="datosGenerales-tab" data-toggle="tab" href="#datosGenerales" role="tab" aria-controls="datosGenerales" aria-selected="true" onclick="">Datos generales</a>
 </li>
  <li class="nav-item">
    <a class="nav-link" id="ubicacion-tab" data-toggle="tab" href="#ubicacion" role="tab" aria-controls="ubicacion" aria-selected="false" onclick="">Ubicación</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="hobbies-tab" data-toggle="tab" href="#hobbies" role="tab" aria-controls="hobbies" aria-selected="false" onclick="">Hobbies</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade" id="datosGenerales" role="tabpanel" aria-labelledby="datosGenerales-tab">
		<br>
		<?= $form->field($model, 'identificacion')->textInput(['maxlength' => true,'placeholder'=> 'Digite la identificación', 'id' =>'txtIdent']) ?>
		
		<?= $form->field($model, 'id_tipos_identificaciones')->dropDownList($identificaciones, ['prompt'=>'Seleccione...']) ?>

		<?= $form->field($model, 'nombres')->textInput(['maxlength' => true,'placeholder'=> 'Digite el nombre', 'id' =>'txtNombre']) ?>

		<?= $form->field($model, 'apellidos')->textInput(['maxlength' => true,'placeholder'=> 'Digite el apellido', 'id' =>'txtApel']) ?>

		<!--<?= $form->field($model, 'fecha_nacimiento')->textInput(['placeholder'=> 'Digite la fecha de nacimiento', 'id' =>'txtFechaNac']) ?>-->
		
		<?= $form->field($model, 'fecha_nacimiento')->widget(
    DatePicker::className(), [
        
         // modify template for custom rendering
        'template' => '{addon}{input}',
		    'language' => 'es',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?> 	 		
		
		<?= $form->field($model, 'id_estados_civiles')->dropDownList($estadosCiviles, ['prompt'=>'Seleccione...']) ?>

		<?= $form->field($model, 'correo')->input('email',['placeholder'=> 'Digite el correo', 'id' =>'txtCorreo']) ?>

		<?= $form->field($model, 'id_generos')->dropDownList($generos, ['prompt'=>'Seleccione...']) ?>
		
		<?= $form->field($model, 'telefonos')->textInput(['maxlength' => true,'placeholder'=> 'Digite el telefono', 'id' =>'txtTele']) ?>
		
		<?= $form->field($model, 'envio_correo')->checkbox() ?>
		
		<?= $form->field($model, 'estado')->dropDownList($estados, ['prompt'=>'Seleccione...']) ?>
		
		<fieldset>
			<legend align="right">Datos de acceso</legend>
			<?= $form->field($model, 'usuario')->textInput(['maxlength' => true,'placeholder'=> 'Digite el nombre de usuario', 'id' =>'txtUsu']) ?>

			<?= $form->field($model, 'psw')->passwordInput(['maxlength' => true,'placeholder'=> 'Digite contraseña', 'id' =>'txtClave']) ?>
	
		</fieldset>
	
  
  </div>
  <div class="tab-pane fade" id="ubicacion" role="tabpanel" aria-labelledby="ubicacion-tab">
		<br>
		<?= $form->field($model, 'id_municipios')->dropDownList($municipios, ['prompt'=>'Seleccione...']) ?>
		
		<?= $form->field($model, 'id_barrios_veredas')->dropDownList($barriosVeredas, ['prompt'=>'Seleccione...']) ?>

		<?= $form->field($model, 'latitud')->textInput(['placeholder'=> 'Digite la latitud', 'id' =>'txtLat']) ?>

		<?= $form->field($model, 'longitud')->textInput(['placeholder'=> 'Digite la longitud', 'id' =>'txtLon']) ?>
		
		<?= $form->field($model, 'domicilio')->textInput(['maxlength' => true,'placeholder'=> 'Digite el domicilio', 'id' =>'txtDom']) ?>
  </div>
  <div class="tab-pane fade" id="hobbies" role="tabpanel" aria-labelledby="hobbies-tab">
	<br>
	<?= $form->field($model, 'hobbies')->textarea(['maxlength' => true,'placeholder'=> 'Digite los hobbies', 'id' =>'txtHobb']) ?>
  </div>
</div>
	

	
    <?= $form->field($model, 'fecha_ultimo_ingreso')->textInput() ?>

    <?= $form->field($model, 'fecha_registro')->textInput() ?>

   


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
