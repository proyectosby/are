<?php
/**********
Versión: 001
Fecha: 10-03-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de Asignaturas
---------------------------------------
Modificaciones:
Fecha: 10-03-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - se cambia a dropDownList "id_sedes" y "estado"
Cambio al boton save -> guardar
---------------------------------------
**********/
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Asignaturas */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="asignaturas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
	
	echo $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
