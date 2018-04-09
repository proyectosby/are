<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Periodos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="periodos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_inicio')->widget(
    DatePicker::className(), [
        
         // modify template for custom rendering
        'template' => '{addon}{input}',
		    'language' => 'es',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);  ?>

    <?= $form->field($model, 'fecha_fin')->widget(
    DatePicker::className(), [
        
         // modify template for custom rendering
        'template' => '{addon}{input}',
		    'language' => 'es',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]); ?>
	
	<?= $form->field($model, 'estado')->dropDownList($estados) ?>
	
	<?= $form->field($model, 'id_sedes')->hiddenInput(['value'=> $idSedes])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
