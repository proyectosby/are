<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilesXPersonas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfiles-xpersonas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field( $model, 'id_personas' )->dropDownList( $personas , [ 'prompt' => 'Seleccione...'  ] ) ?>
	
    <?= $form->field( $modelRepresentantesLegales, 'id_personas' )->dropDownList( $representantesLegales , [ 'prompt' => 'Seleccione...'  ] ) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
