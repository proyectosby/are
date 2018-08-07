<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Collapse;
use dosamigos\datepicker\DatePicker;
/**********
Versión: 001
Fecha: 07-08-2018
Desarrollador: Oscar David Lopez
Descripción: formulario de Instrumento de autoevaluación al Docente-Tutor en el proceso de acompañamiento
---------------------------------------
Modificaciones:
Fecha: 07-08-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - creacion del formulario
---------------------------------------
**********/
/* @var $this yii\web\View */
/* @var $model app\models\GestionCurricularDocenteTutorAcompanamiento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gestion-curricular-docente-tutor-acompanamiento-form">

    <?php $form = ActiveForm::begin(); ?>
	
	
	
	<?php 
	
	$content="";
	$content.=
	 $form->field($model, 'fecha')->widget(
			DatePicker::className(), [
				
			 // modify template for custom rendering
			'template' 		=> '{addon}{input}',
			'language' 		=> 'es',
			'clientOptions' => [
				'autoclose' 	=> true,
				'format' 		=> 'yyyy-mm-dd'
			],
		]). 
    $form->field($model, 'nombre_profesional_acompanamiento')->textInput(['maxlength' => true]). 
    $form->field($model, 'id_docente')->dropDownList($docentes,['prompt'=>'Seleccione...']) .
    $form->field($model, 'id_institucion')->dropDownList($instituciones) . 
    $form->field($model, 'id_sede')->dropDownList($sedes,['prompt'=>'Seleccione...']) 
	;
	
	
	$items[0] = 
				[
					'label'=> "Docente Tutor",
					'content'=>$content,
					'contentOptions'=> []
				];
	$content1="<h2>Dimensión del SER</h2>
	<br />
	A continuación encontrará una serie de afirmaciones sobre aspectos relacionados con el SER del Docente-Tutor; califique de 1 a 4 siendo 1 Nunca y 4 Siempre, de acuerdo a la frecuencia en que usted considera que se evidencian estas características.
	<br />
	<br />";
	foreach ($titulos1 as $titulo1)
	{
		$content1.= $form->field( $model , 'id' )->radioList( $parametro1 )->label(  $titulo1 );
	}
	
	$content1.="<h2>Dimensión del HACER</h2>
	<br />
	A continuación encontrará una serie de afirmaciones sobre aspectos relacionados con el HACER del Docente-Tutor; califique de 1 a 4 siendo 1 Nunca y 4 Siempre, de acuerdo a la frecuencia en que usted considera que se evidencian estas características.
	<br />
	<br />";
	foreach ($titulos2 as $titulo2)
	{
		$content1.= $form->field( $model , 'id' )->radioList( $parametro1 )->label(  $titulo2 );
	}
	
	$content1.="<h2>Dimensión del SABER</h2>
	<br />
	A continuación encontrará una serie de afirmaciones sobre aspectos relacionados con el SABER del Docente-Tutor; califique de 1 a 4 siendo 1 Nunca y 4 Siempre, de acuerdo a la frecuencia en que usted considera que se evidencian estas características.
	<br />
	<br />";
	foreach ($titulos3 as $titulo3)
	{
		$content1.= $form->field( $model , 'id' )->radioList( $parametro1 )->label(  $titulo3 );
	}
		
		
	// $form->field( $model7 , 'descripcion' )->radioList( $parametros )->label(  "pruebas" );
			
	// $content1 = "<h3>Informe mensual de acompañamiento</h3>
// En la primera parte del documento haga un balance acumulativo del cumplimiento de los objetivos trabajados hasta el momento, explicando el nivel de avance alcanzado en cada uno; justifique y argumente su respuesta. En la segunda parte escriba sus reflexiones acerca de las lecciones aprendidas y por último elabore una propuesta que le permita reformular, ajustar, cambiar y/o eliminar las actividades o acciones según su criterio y en función de los objetivos. (descargar plantilla para informe)";
	// $content1 .= $form->field($model9, 'ruta_archivo')->FileInput()->label("");
	// $content1 .= $form->field($model9, 'ruta_archivo')->hiddenInput()->label(false);
	$items[1] = 
				[
					'label'=> "Seguimiento del Docente-Tutor",
					'content'=>$content1,
					'contentOptions'=> []
				];
		
		echo Collapse::widget([
		'items' => $items,
		]); ?>

  

   

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
