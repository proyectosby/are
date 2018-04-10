<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Sedes;
use	yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\AsignaturasNivelesSedes */
/* @var $form yii\widgets\ActiveForm */
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/asignaturasNivelesSedes.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>


<div class="asignaturas-niveles-sedes-form">

    <?php $form = ActiveForm::begin(); ?>
    
	<?php 
		$model1 = new Sedes();
		$model1->id=$idSedes;
		$sedes = Sedes::find()->orderby('descripcion')->all();
		$sedes = ArrayHelper::map($sedes,'id','descripcion');		
		echo $form->field($model1, 'descripcion')->dropDownList( $sedes, ['prompt'=>'Seleccione...','onchange'=>'llenarListas()','options' => [$model1['id'] => ['selected' => 'selected']]] )->label('Sedes');
		
    ?>
		        

	<?= $form->field($model, 'id_sedes_niveles')->dropDownList(['prompt'=>'Seleccione...'])->label('Niveles') ?>
	
    <?= $form->field($model, 'id_asignaturas')->dropDownList(['prompt'=>'Seleccione...']) ?>

    <?= $form->field($model, 'intensidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
