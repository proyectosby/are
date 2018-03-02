<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\NivelesAcademicos;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Niveles */
/* @var $form yii\widgets\ActiveForm */

$NivelesAcademicosTabla	 = new NivelesAcademicos();
$NivelesAcademicosTabla	 = $NivelesAcademicosTabla->find()->orderby('id')->all();
$NivelesAcademicosTabla	 = ArrayHelper::map( $NivelesAcademicosTabla, 'id', 'descripcion' );
?>

<div class="niveles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'id_niveles_academicos')->dropDownList( $NivelesAcademicosTabla, [ 'prompt' => 'Seleccione...', 'id' ] ) ?>
	<?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
