<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Documentos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documentos-form">

    <?php $form = ActiveForm::begin([
		'method' 				=> 'post',
		'enableClientValidation'=> true,
		'options' 				=> [ 'enctype' => 'multipart/form-data' ],
	]); ?>

    <?= $form->field($model, 'ruta')->label('Archivo')->fileInput([ 'accept' => ".doc, .docx, .pdf, .xls" ]) ?>
    
	<!-- <?= Html::fileInput( 'file', '', [ 'accept' => ".doc, .docx, .pdf, .xls" ] ) ?> -->

    <?= $form->field($model, 'id_persona')->dropDownList( $personas, [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, 'tipo_documento')->dropDownList( $tiposDocumento, [ 'prompt' => 'Seleccione...' ] ) ?>

    <?= $form->field($model, 'estado')->dropDownList( $estados ) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
