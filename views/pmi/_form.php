<?php

/**********
Versión: 001
Fecha: 12-07-2018
Desarrollador: Edwin Molina Grisales
Descripción: CRUD PMI
---------------------------------------
**********/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use nex\chosen\Chosen;

/* @var $this yii\web\View */
/* @var $model app\models\Pmi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pmi-form">

    <?php $form = ActiveForm::begin(); ?>
    
	<?= $form->field($model, 'id_institucion')->dropDownList( [ $institucion->id => $institucion->descripcion ] ) ?>

    <?= $form->field($model, 'codigo_dane')->textInput(['maxlength' => true, 'value' => $institucion->codigo_dane ] ) ?>

    <?= $form->field($model, 'anio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comuna')->widget(
		Chosen::className(), [
			'items' => $comunas,
			'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
			'clientOptions' => [
				'search_contains' => true,
				'single_backstroke_delete' => false,
			],
	]);?>

    <?= $form->field($model, 'zona')->dropDownList( $zonas, [ 'prompt' => 'Seleccione...' ] ) ?>
	
	<?= $form->field($model, 'id_proceso_especifico')->widget(
		Chosen::className(), [
			'items' => $procesos,
			'disableSearch' => 5, // Search input will be disabled while there are fewer than 5 items
			'clientOptions' => [
				'search_contains' => true,
				'single_backstroke_delete' => false,
			],
	]);?>

    <?= $form->field($model, 'valor')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'estado')->dropDownList( $estados ) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
