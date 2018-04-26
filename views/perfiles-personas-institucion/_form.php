<?php

/**********
Versión: 001
Fecha: 25-04-2018
Desarrollador: Maria Viviana Rodas
Descripción: Form de perfiles persona institucion
---------------------------------------
*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilesPersonasInstitucion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perfiles-personas-institucion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_institucion')->dropDownList($instituciones,['prompt' => 'Seleccione...']) ?>
	
	<?= $form->field($perfilesTable, 'id_perfiles')->dropDownList($perfiles,['prompt' => 'Seleccione...'])->label("Perfil") ?>
	
	<?= $form->field($model, 'id_perfiles_x_persona')->dropDownList($perfilesPersonas,['prompt' => 'Seleccione...']) ?>

    <?= $form->field($model, 'estado')->dropDownList($estados,['prompt' => 'Seleccione...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
