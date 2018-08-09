<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use dosamigos\datepicker\DatePicker;
use app\models\Sedes;
use app\models\Instituciones;
use nex\chosen\Chosen;
use	yii\helpers\ArrayHelper;
use yii\bootstrap\Collapse;
/**********
Versión: 001
Fecha: 30-07-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de Representantes Legales (Estudiantes)
---------------------------------------
Modificaciones:
Fecha: 30-07-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - Modificacion de lo campos
---------------------------------------
**********/


/* @var $this yii\web\View */
/* @var $model app\models\GestionCurricularBitacorasVisitasIeo */
/* @var $form yii\widgets\ActiveForm */

$idInstitucion = $_SESSION['instituciones'][0];
$idSede = $_SESSION['sede'][0];
$nombreInstitucion = Instituciones::find()->where(['id' => @$idInstitucion])->one();
$nombreInstitucion = $nombreInstitucion->descripcion;
$arrayInstitucion[$idInstitucion]= $nombreInstitucion;

$nombreSede = Sedes::find()->where(['id' => @$idSede ])->one();
$nombreSede = @$nombreSede->descripcion;
$arraySede[$idSede]= $nombreSede;
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/gestionCurricularBitacorasVisitasIeo.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>
 <!-- inicio primer  -->
	<div id="w3" class="panel-group"><div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title"><a class="collapse-toggle" data-toggle="collapse" data-target="#infoGeneral">
	Información General
	</a></h4></div></div></div>
  
<div class="gestion-curricular-bitacoras-visitas-ieo-form">
<div id="infoGeneral" class="collapse">
    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'fecha_inicio')->widget(
			DatePicker::className(), [
				
			 // modify template for custom rendering
			'template' 		=> '{addon}{input}',
			'language' 		=> 'es',
			'clientOptions' => [
				'autoclose' 	=> true,
				'format' 		=> 'yyyy-mm-dd'
			],
		])->label("Fecha de inicio del ciclo");  
	?>

    <?= $form->field($model, 'fecha_fin')->widget(
			DatePicker::className(), [
				
			 // modify template for custom rendering
			'template' 		=> '{addon}{input}',
			'language' 		=> 'es',
			'clientOptions' => [
				'autoclose' 	=> true,
				'format' 		=> 'yyyy-mm-dd'
			],
		])->label("Fecha final del ciclo");  
	?>


	<?= $form->field($model, 'id_persona_docente_tutor')->widget(
				Chosen::className(), [
					'items' => $docentes,
					'disableSearch' => 1, // Search input will be disabled while there are fewer than 5 items
					'placeholder' => 'Seleccione...',
					'clientOptions' => [
						'search_contains' => true,
						'single_backstroke_delete' => false,
					],
			])->label("Docente tutor a cargo");?>

    <?= $form->field($model, 'id_institucion')->DropDownList($arrayInstitucion)->label("IEO que acompañará") ?>

    <?= $form->field($model, 'id_sede')->DropDownList($arraySede)->label("Sede que acompañará") ?>

    <?= $form->field($model, 'id_jornada')->DropDownList($jornadas) ?>

    <?php  $form->field($model, 'estado')->DropDownList($estados) ?>
	
		</div>
	
	<div id="w3" class="panel-group"><div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">
	<a class="collapse-toggle" data-toggle="collapse" data-target="#semana1">
		Semana No. 1
	</a>
	</h4></div></div></div>
	
	<div id="semana1" class="collapse">
		<?= $form->field($model2, 'descripcion')->hiddenInput(['value'=> "Semana No. 1"])->label(false); ?>
		
		<?= $form->field($model2, 'fecha_inicial')->widget(
				DatePicker::className(), [
					
				 // modify template for custom rendering
				'template' 		=> '{addon}{input}',
				'language' 		=> 'es',
				'clientOptions' => [
					'autoclose' 	=> true,
					'format' 		=> 'yyyy-mm-dd'
				],
			])->label("Fecha inicial (acompañamiento)");  
		?>
			
		<?= $form->field($model2, 'fecha_final')->widget(
				DatePicker::className(), [
					
				 // modify template for custom rendering
				'template' 		=> '{addon}{input}',
				'language' 		=> 'es',
				'clientOptions' => [
					'autoclose' 	=> true,
					'format' 		=> 'yyyy-mm-dd'
				],
			])->label("Fecha final (acompañamiento)");  
		?>
		
	</div>
	
	<div id="w3" class="panel-group"><div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">
	<a class="collapse-toggle" data-toggle="collapse" data-target="#semana1Momento1">
		Momento 1. Planeación de la semana 1
	</a>
	</h4></div></div></div>
	<div id="semana1Momento1" class="collapse">
	
	<label>Objetivos a trabajar *</label>
	<br />
	<label><h6>Seleccione los objetivos que se trabajarán a través de las actividades planteadas para esta semana</h6></label>
	 <h6><?= Html::checkboxList('list', '', $momento1Sem1,array( 'separator' => "<br /><br/><br/>")) ?></h6>
	 
	 
		<div class="field_wrapper">
			<label>
				Actividades Semana No. 1
			</label>
			<br />
			<label>
			<h6>
				Describa las actividades que llevará a cabo durante la Semana No. 1, para el avance de los objetivos de la semana.
			</h6>
			</label>
			<?= $form->field($model3, 'titulo')->textInput(['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])->label("Actividad Planeada"); ?>
			<?= $form->field($model3, 'descripcion')->textarea(['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])->Label("Descripción Actividad Planeada") ?>
				Agregar Actividades Semana No. 1<a href="javascript:void(0);" class="add_button" title="Agregar Campos"><img src="../web/images/agregar.png" height="30" width="30" /></a>
			
		</div>
		
		

		<div class="field_wrapper1">
			<label>
				Resultados esperados semana No. 1
			</label>
			<br />
			<label>
			<h6>
				Describa los resultados que se espera obtener de la actividades que se adelantarán en la semana No. 1.
			</h6>
			</label>
			<?= $form->field($model4, 'titulo')->textInput(['name'=>'gestioncurricularresultadosesperados-titulo[]'])->Label("Resultado Esperado"); ?>
			<?= $form->field($model4, 'descripcion')->textarea(['name'=>'gestioncurricularresultadosesperados-titulo[]'])->Label("Descripción Resultado Esperado") ?>
				<a href="javascript:void(0);" class="add_button1" title="Agregar Campos"><img src="../web/images/agregar.png" height="30" width="30" /></a>
			
		</div>
		
		

		<div class="field_wrapper2">
			<label>
				Productos esperados semana No. 1
			</label>
			<br />
			<label>
			<h6>
				Describa los productos que se espera obtener de la actividades que se adelantarán en la semana No. 1.
			</h6>
			</label>
			<?= $form->field($model5, 'titulo')->textInput(['name'=>'gestioncurricularresultadosesperados-titulo[]'])->Label("Producto Esperado"); ?>
			<?= $form->field($model5, 'descripcion')->textarea(['name'=>'gestioncurricularresultadosesperados-titulo[]'])->Label("Descripción Producto Esperado"); ?>
				<a href="javascript:void(0);" class="add_button2" title="Agregar Campos"><img src="../web/images/agregar.png" height="30" width="30" /></a>
			
		</div>
		
	</div>
	
	<div id="w3" class="panel-group"><div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">
	<a class="collapse-toggle" data-toggle="collapse" data-target="#semana1Momento2">
		Momento 2. Desarrollo de la agenda semana 1
	</a>
	</h4></div></div></div>
	<div id="semana1Momento2" class="collapse">
		<label>
			Visita de acompañamiento día 1 (asistió a la IEO)
		</label>
		<br />
	
	<?= $form->field($model6, 'asistio')->radio(['label' => 'Sí', 'value' => true, 'uncheck' => null]) ?>
	<?= $form->field($model6, 'asistio')->radio(['label' => 'No', 'value' => false, 'uncheck' => null]) ?>
	<?= $form->field($model6, 'ruta_archivo')->FileInput(['name'=>'gestioncurricularresultadosesperados-titulo[]'])
	->label("Fotografía (evidencia) de la visita semana 1 día 1"); ?>
	
		<label>
			Visita de acompañamiento día 2 (asistió a la IEO)
		</label>
		<br />
	
	<?= $form->field($model6, 'asistio')->radio(['label' => 'Sí', 'value' => true, 'uncheck' => null]) ?>
	<?= $form->field($model6, 'asistio')->radio(['label' => 'No', 'value' => false, 'uncheck' => null]) ?>
	<?= $form->field($model6, 'ruta_archivo')->FileInput(['name'=>'gestioncurricularresultadosesperados-titulo[]'])
	->label("Fotografía (evidencia) de la visita semana 1 día 2"); ?>
	
		<label>
			Visita de acompañamiento día 3 (asistió a la IEO)
		</label>
		<br />
	
	<?= $form->field($model6, 'asistio')->radio(['label' => 'Sí', 'value' => true, 'uncheck' => null]) ?>
	<?= $form->field($model6, 'asistio')->radio(['label' => 'No', 'value' => false, 'uncheck' => null]) ?>
	<?= $form->field($model6, 'ruta_archivo')->FileInput(['name'=>'gestioncurricularresultadosesperados-titulo[]'])
	->label("Fotografía (evidencia) de la visita semana 1 día 3"); ?>
	
	<?= $form->field($model6, 'no_visita')->textarea()
	->label("En caso de que no haya podido cumplir una o más visitas exponga las razones."); ?>
	
	

	<label>Actividades ejecutadas semana 1</label>
	<br />
	<label><h6>Describa el desarrollo de cada una de las actividades adelantadas para el cumplimiento del objetivo, según lo planeado en el momento 1.</h6></label>
	<?= $form->field($model7, 'descripcion_respuesta')->textInput()->label(false) ?>
	<div class="field_wrapper3">
		
		<br />
		<?= $form->field($model7, 'actividad_planeada')->textInput(['name'=>'gestioncurricularactividadesplaneadas-descripcion[]']); ?>
		<?= $form->field($model7, 'se_realizo')->dropDownList($parametro,['name'=>'gestioncurricularactividadesplaneadas-descripcion[]']) ?>
		<?= $form->field($model7, 'descripcion_actividad')->textInput(['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])->
		label("Descripción de la actividad ejecutada")		?>
		<?= $form->field($model7, 'justificacion')->textarea(['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])->label("Justificación en el cumplimiento de las actividades (Diligencie sólo en caso de haber respondido no o parcialmente)") ?>
		<?= $form->field($model7, 'id_momento')->hiddenInput(['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])->label(false) ?>
	</div>
	<br />
	Agregar
	<a href="javascript:void(0);" class="add_button3" title="Agregar Campos"><img src="../web/images/agregar.png" height="30" width="30" /></a>
	</div>
	
	
	
	<div id="w3" class="panel-group"><div class="panel panel-default"><div class="panel-heading"><h4 class="panel-title">
	<a class="collapse-toggle" data-toggle="collapse" data-target="#semana1Momento3">
		Momento 3. Seguimiento semana 1
	</a>
	</h4></div></div></div>
	<div id="semana1Momento3" class="collapse">	


	<label>Resultados obtenidos semana 1</label>
	<br />
	<label><h6>Puntualice los resultados de cada una de las actividades realizadas</h6></label>
	<?= $form->field($model7, 'descripcion_respuesta')->textInput()->label(false) ?>
	<div class="field_wrapper4">
		
		<br />
		<?= $form->field($model7, 'actividad_planeada')->textInput(['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])->Label("Resultado esperado"); ?>
		<?= $form->field($model7, 'se_realizo')->dropDownList($parametro,['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])->Label("¿Se lograron?"); ?>
		<?= $form->field($model7, 'descripcion_actividad')->textInput(['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])->Label("Descripción del resultado obtenido") ?>
		<?= $form->field($model7, 'justificacion')->textarea(['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])
		->Label("Justificación en el cumplimiento del resultado obtenido (Diligencie sólo en caso de haber respondido no o parcialmente)") ?>
		<?= $form->field($model7, 'id_momento')->hiddenInput(['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])->label(false) ?>
	</div>
	<br />
	Agregar
	<a href="javascript:void(0);" class="add_button4" title="Agregar Campos"><img src="../web/images/agregar.png" height="30" width="30" /></a>
	
	<br />
	<br />
	<label>Productos obtenidos semana 1</label>
	<br />
	<?= $form->field($model7, 'descripcion_respuesta')->textInput()->label(false) ?>
	<div class="field_wrapper5">
		
		<br />
		<?= $form->field($model7, 'actividad_planeada')->textInput(['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])->Label("Producto esperado"); ?>
		<?= $form->field($model7, 'se_realizo')->dropDownList($parametro,['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])->Label("¿Se logragon?"); ?>
		<?= $form->field($model7, 'descripcion_actividad')->textInput(['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])->Label("Descripción del producto obtenido") ?>
		<?= $form->field($model7, 'justificacion')->textarea(['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])
		->Label("Justificación en el cumplimiento del producto (Diligencie sólo en caso de haber respondido no o parcialmente)") ?>
		<?= $form->field($model7, 'id_momento')->hiddenInput(['name'=>'gestioncurricularactividadesplaneadas-descripcion[]'])->label(false) ?>
	</div>
	<br />
	Agregar
	<a href="javascript:void(0);" class="add_button5" title="Agregar Campos"><img src="../web/images/agregar.png" height="30" width="30" /></a>
	
	</div>
	
	
	
	    <?php 
		
		
	
	$content="Para elegir el nivel de avance en los objetivos planteados para todo el proceso de formación, tenga en cuenta los siguientes criterios:
	<br />
	<h3> Niveles de avance en los objetivos</h3>
	<img src='../web/images/ImagenCriteriosObjetivos.jpg' height='800' width='900' >
	<br />
	<br />
	<br />
	";
	foreach ($titulos as $titulo)
	{
		$content.= $form->field( $model7 , 'actividad_planeada' )->radioList( $parametro,array( 'separator' => "<br />") )->label(  $titulo );
	}
	$content.= $form->field($model8, 'descripcion_respuesta')->textarea()
				->label("El espacio siguiente tiene como propósito el que usted pueda ampliar, justificar, argumentar o explicar su nivel de avance en la consecución de cada uno de los objetivos seleccionados durante este ciclo.");
	$content.= $form->field($model8, 'id_momento')->hiddenInput()->label(false);
		
	// $form->field( $model7 , 'descripcion' )->radioList( $parametros )->label(  "pruebas" );
			//pendiente modelo para guardar
	$items[] = 
				[
					'label'=> "Momento 4. Niveles de avance en el logro de los objetivos",
					'content'=>$content,
					'contentOptions'=> []
				];
	
	
	$content1 = "<h3>Informe mensual de acompañamiento</h3>
En la primera parte del documento haga un balance acumulativo del cumplimiento de los objetivos trabajados hasta el momento, explicando el nivel de avance alcanzado en cada uno; justifique y argumente su respuesta. En la segunda parte escriba sus reflexiones acerca de las lecciones aprendidas y por último elabore una propuesta que le permita reformular, ajustar, cambiar y/o eliminar las actividades o acciones según su criterio y en función de los objetivos. (descargar plantilla para informe)";
	$content1 .= $form->field($model9, 'ruta_archivo')->FileInput()->label("");
	$content1 .= $form->field($model9, 'ruta_archivo')->hiddenInput()->label(false);
	$items[] = 
				[
					'label'=> "Informe mensual de acompañamiento",
					'content'=>$content1,
					'contentOptions'=> []
				];
		
		echo Collapse::widget([
		'items' => $items,
		]); ?>
	
	
	</div>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>	

</div>
