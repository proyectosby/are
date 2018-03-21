<?php

/**********
Versión: 001
Fecha: Fecha en formato (15-03-2018)
Desarrollador: Viviana Rodas
Descripción: Formulario distribuciones academicas
---------------------------------------
******/

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\SedesNiveles;

/* @var $this yii\web\View */
/* @var $model app\models\DistribucionesAcademicas */
/* @var $form yii\widgets\ActiveForm */
?>



<?php //echo $idSedes; ?>
<div class="distribuciones-academicas-form">
    
	<?php $form = ActiveForm::begin(); ?>
	
	<?php 
		
		echo "<input type='hidden' id='hidAsig' name='hidAsig' value='".$asignaturas_distribucion."'>";
		echo "<input type='hidden' id='hidModificar' name='hidModificar' value='".$modificar."'>";
		echo "<input type='hidden' id='hidIdSede' name='hidIdSede' value='".$idSedes."'>";
		
		$model1 = new SedesNiveles();
					// $model1->id=$idSedes;
					
					//variable con la conexion a la base de datos
					$connection = Yii::$app->getDb();
					//saber el id de la sede para llenar los niveles de esa sede
					$command = $connection->createCommand("SELECT sn.id, n.descripcion
															FROM public.sedes_niveles as sn, niveles as n
															where sn.id_sedes = $idSedes
															and sn.id_niveles = n.id
															and n.estado = 1");
					$result = $command->queryAll();
					foreach($result as $key){
						$nivel[$key['id']]=$key['descripcion'];
					}
					
				
		
		$model1->id=$niveles_sede;
		
		
		
		echo $form->field($model1, 'id')->dropDownList($nivel, ['prompt'=>'Seleccione...','id' =>'selSedesNivel','options' => [$model1['id'] => ['selected' => 'selected']]])->label('Nivel'); 
		
		$model->id=$asignaturas_distribucion;
	
	?>
	
    <?= $form->field($model, 'id_asignaturas_x_niveles_sedes')->dropDownList([''=>'Seleccione...'])->label('Asignatura') ?>
    
    <?= $form->field($model, 'id_perfiles_x_personas_docentes')->dropDownList($docentes, ['prompt'=>'Seleccione...'])->label('Docente') ?>

    <?= $form->field($model, 'id_aulas_x_sedes')->dropDownList($aulas, ['prompt'=>'Seleccione...'])->label('Aula') ?>
    
	<?= $form->field($model, 'id_paralelo_sede')->dropDownList($grupos, ['prompt'=>'Seleccione...'])->label('Grupo') ?>

    <!-- Campos de fecha que no se envian desde el formulario se envian con datos de fecha del sistema -->
	<?php $date =  date ( 'Y-m-d H:m:s' )?>
	
	<?= $form->field($model, 'fecha_ingreso')->hiddenInput(['value'=> $date])->label(false)?>
	
    <?= $form->field($model, 'estado')->dropDownList($estados, ['prompt'=>'Seleccione...']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<button type="button" class="btn btn-primary" id='btnHorario'>Horario</button>
