<?php

/**********

Versión: 001
Fecha: 02-04-2018
REPORTES VARIOS
---------------------------------------
Fecha: 12-04-2018
Persona encargada: Edwin Molina Grisales
Cambios realizados: - Se agrega opción Listado de estudiantes por grupo
---------------------------------------
Fecha: 11-04-2018
Persona encargada: Oscar David Lopez Villa
Se crea reporte tasa de cobertura bruta

---------------------------------------
Modificaciones:
Fecha: 02-04-2018
Persona encargada: Edwin Molina Grisales
Se crea reporte de PORCENTAJE OCUPACION DE AULAS
---------------------------------------
Fecha: 02-04-2018
Persona encargada: Edwin Molina Grisales
Se crea reporte de CANTIDAD DE ESTUDIATNES POR GRUPO con su resumido por cantidad y corresponde a la opción 2 del switch
---------------------------------------
**********/

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

use app\models\Sedes;
use app\models\Instituciones;
use fedemotta\datatables\DataTables;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AsginaturasBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

/**********
Versión: 001
Fecha: 10-03-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de asignaturas
---------------------------------------
Modificaciones:
Fecha: 10-03-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - se cambia el atributo id_sede para que muestre la descripcion de la sede segun el id_sede
 de la tabla asigaciones
---------------------------------------
**********/

$nombreSede = new Sedes();
$nombreSede = $nombreSede->find()->where('id='.$idSedes)->all();
$nombreSede = ArrayHelper::map($nombreSede,'id','descripcion');
$nombreSede = $nombreSede[$idSedes];

$nombreInstitucion = new Instituciones();
$nombreInstitucion = $nombreInstitucion->find()->where('id='.$idInstitucion)->all();
$nombreInstitucion = ArrayHelper::map($nombreInstitucion,'id','descripcion');
$nombreInstitucion = $nombreInstitucion[$idInstitucion];

$this->title = $nombreInstitucion;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignaturas-index">

    <h1><?= Html::encode($nombreSede) ?></h1>
   

     <?php
	 
		switch ($idReporte) 
		{
			case 1:
				?>
					<h2><?= Html::encode( " Cantidad de Estudiantes IEO/Sede" ) ?></h2><br>
					<div style='text-align:center;font-weight:bold;padding:20px;font-size:12pt;'>Cantidad de Estudiantes: <?= $dataProvider->getTotalCount() ?></div>
				<?php
					echo  DataTables::widget([
					'dataProvider' => $dataProvider,
					'clientOptions' => [
					'language'=>[
							'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
						],
					"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
					"info"=>false,
					"responsive"=>true,
					"dom"=> 'lfTrtip',
					"tableTools"=>[
						"aButtons"=> [  
							[
							"sExtends"=> "csv",
							"sButtonText"=> Yii::t('app',"CSV")
							],
							[
							"sExtends"=> "xls",
							"oSelectorOpts"=> ["page"=> 'current']
							],
							[
							"sExtends"=> "pdf",
							"sButtonText"=> Yii::t('app',"PDF")
							],
						],
					],
				],
					'columns' => 
					[
						['class' => 'yii\grid\SerialColumn'], 
						
						[
							'attribute' => 'identificacion',
							'label'		=> 'Documento',
						],
						[
							'attribute' => 'nombres',
							'label'		=> 'Nombre',
						],
						[
							'attribute' => 'domicilio',
							'label'		=> 'Dirección',
						],
						[
							'attribute' => 'descripcion',
							'label'		=> 'Descripción',
						],

					],
				]); 
					
				break;
			
			case 2:
				
					?>
						<h2><?= Html::encode( "Cantidad de estudiantes por grado" ) ?></h2><br>
					<?php
				
					echo  DataTables::widget([
						'dataProvider' => $dataProviderCantidad,
						'clientOptions' => [
							'language'=>[
									'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
								],
							"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
							"info"=>false,
							"responsive"=>true,
							"dom"=> 'lfTrtip',
							"tableTools"=>[
								"aButtons"=> [  
									[
									"sExtends"=> "csv",
									"sButtonText"=> Yii::t('app',"CSV")
									],
									[
									"sExtends"=> "xls",
									"oSelectorOpts"=> ["page"=> 'current']
									],
									[
									"sExtends"=> "pdf",
									"sButtonText"=> Yii::t('app',"PDF")
									],
								],
							],
						],
						'columns' => 
						[
							['class' => 'yii\grid\SerialColumn'],
							
							[
								'attribute' => 'grados',
								'label'		=> 'Grados',
							],
							[
								'attribute' => 'cantidad',
								'label'		=> 'Cantidad',
							],
							
						],
					]);
					
					
					echo  DataTables::widget([
						'dataProvider' => $dataProvider,
						'clientOptions' => [
							'language'=>[
									'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
								],
							"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
							"info"=>false,
							"responsive"=>true,
							"dom"=> 'lfTrtip',
							"tableTools"=>[
								"aButtons"=> [  
									[
									"sExtends"=> "csv",
									"sButtonText"=> Yii::t('app',"CSV")
									],
									[
									"sExtends"=> "xls",
									"oSelectorOpts"=> ["page"=> 'current']
									],
									[
									"sExtends"=> "pdf",
									"sButtonText"=> Yii::t('app',"PDF")
									],
								],
							],
						],
						'columns' => 
						[
							['class' => 'yii\grid\SerialColumn'], 
							[
								'attribute' => 'identificacion',
								'label'		=> 'Documento',
							],
							[
								'attribute' => 'nombres',
								'label'		=> 'Nombre',
							],
							[
								'attribute' => 'domicilio',
								'label'		=> 'Dirección',
							],
							[
								'attribute' => 'nivel',
								'label'		=> 'Grado',
							],
							[
								'attribute' => 'descripcion',
								'label'		=> 'Jornada',
							],

						],
					]); 
				break;
			case 3:
				?>
						<h2><?= Html::encode( "Cantidad de Estudiantes por Grupo" ) ?></h2><br>
					<?php
				
					echo  DataTables::widget([
						'dataProvider' => $dataProviderCantidad,
						'clientOptions' => [
							'language'=>[
									'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
								],
							"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
							"info"=>false,
							"responsive"=>true,
							"dom"=> 'lfTrtip',
							"tableTools"=>[
								"aButtons"=> [  
									[
									"sExtends"=> "csv",
									"sButtonText"=> Yii::t('app',"CSV")
									],
									[
									"sExtends"=> "xls",
									"oSelectorOpts"=> ["page"=> 'current']
									],
									[
									"sExtends"=> "pdf",
									"sButtonText"=> Yii::t('app',"PDF")
									],
								],
							],
						],
						'columns' => 
						[
							// ['class' => 'yii\grid\SerialColumn'], 
							[
								'attribute' => 'nivel',
								'label'		=> 'Grado',
							],
							[
								'attribute' => 'grupo',
								'label'		=> 'Grupo',
							],
							[
								'attribute' => 'cantidad',
								'label'		=> 'Cantidad de estudiantes',
							],
						],
					]);
					
					
					echo  DataTables::widget([
						'dataProvider' => $dataProvider,
						'clientOptions' => [
							'language'=>[
									'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
								],
							"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
							"info"=>false,
							"responsive"=>true,
							"dom"=> 'lfTrtip',
							"tableTools"=>[
								"aButtons"=> [  
									[
									"sExtends"=> "csv",
									"sButtonText"=> Yii::t('app',"CSV")
									],
									[
									"sExtends"=> "xls",
									"oSelectorOpts"=> ["page"=> 'current']
									],
									[
									"sExtends"=> "pdf",
									"sButtonText"=> Yii::t('app',"PDF")
									],
								],
							],
						],
						'columns' => 
						[
							['class' => 'yii\grid\SerialColumn'], 
							[
								'attribute' => 'identificacion',
								'label'		=> 'Documento',
							],
							[
								'attribute' => 'nombres',
								'label'		=> 'Nombre',
							],
							[
								'attribute' => 'domicilio',
								'label'		=> 'Dirección',
							],
							[
								'attribute' => 'nivel',
								'label'		=> 'Grado',
							],
							[
								'attribute' => 'grupo',
								'label'		=> 'Grupo',
							],
							[
								'attribute' => 'descripcion',
								'label'		=> 'Jornada',
							],

						],
					]); 
				break;
			
			case 4:
				?>
					
					<h2><?= Html::encode( "Porcentaje ocupación de aulas" ) ?></h2><br>
					
					<?php
					echo  DataTables::widget([
						'dataProvider' => $dataProvider,
						'clientOptions' => [
							'language'=>[
									'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
								],
							"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
							"info"=>false,
							"responsive"=>true,
							"dom"=> 'lfTrtip',
							"tableTools"=>[
								"aButtons"=> [  
									[
									"sExtends"=> "csv",
									"sButtonText"=> Yii::t('app',"CSV")
									],
									[
									"sExtends"=> "xls",
									"oSelectorOpts"=> ["page"=> 'current']
									],
									[
									"sExtends"=> "pdf",
									"sButtonText"=> Yii::t('app',"PDF")
									],
								],
							],
						],
						'columns' => 
						[
							// ['class' => 'yii\grid\SerialColumn'], 
							[
								'attribute' => 'aula',
								'label'		=> 'Aula',
								// 'value'		=> '1111',
							],
							[
								'label'		=> 'Ocupacion',
								'value'		=> function($data){ 
													return ( round( $data['cantidad_ocupada']/$data['capacidad'], 2 )*100 )."%"; 
											   },
							],
						],
					]);
				break;
				case 5:
				?>
					
					<h2><?= Html::encode( "Tasa de cobertura bruta" ) ?></h2><br>
					
					<?php
					
					echo  DataTables::widget([
						'dataProvider' => $dataProvider,
						'clientOptions' => [
							'language'=>[
									'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
								],
							"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
							"info"=>false,
							"responsive"=>true,
							"dom"=> 'lfTrtip',
							"tableTools"=>[
								"aButtons"=> [  
									[
									"sExtends"=> "csv",
									"sButtonText"=> Yii::t('app',"CSV")
									],
									[
									"sExtends"=> "xls",
									"oSelectorOpts"=> ["page"=> 'current']
									],
									[
									"sExtends"=> "pdf",
									"sButtonText"=> Yii::t('app',"PDF")
									],
								],
							],
						],
						'columns' => 
						[
							['class' => 'yii\grid\SerialColumn'],
							'transcision',
							'primaria',
							'secundaria',
							'media',
						],
					]);
					
					
				break;
				case 6:
				?>
					 
					<h2><?= Html::encode( "Tasa de cobertura Neta" ) ?></h2><br>
					
					<?php
					
					echo  DataTables::widget([
						'dataProvider' => $dataProvider,
						'clientOptions' => [
							'language'=>[
									'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
								],
							"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
							"info"=>false,
							"responsive"=>true,
							"dom"=> 'lfTrtip',
							"tableTools"=>[
								"aButtons"=> [  
									[
									"sExtends"=> "csv",
									"sButtonText"=> Yii::t('app',"CSV")
									],
									[
									"sExtends"=> "xls",
									"oSelectorOpts"=> ["page"=> 'current']
									],
									[
									"sExtends"=> "pdf",
									"sButtonText"=> Yii::t('app',"PDF")
									],
								],
							],
						],
						'columns' => 
						[
							['class' => 'yii\grid\SerialColumn'],
							'transcision',
							'primaria',
							'secundaria',
							'media',
						],
					]);
					
					
				break;
				
				case 7:
				?>
					 
					<h2><?= Html::encode( "Listado de estudiantes por grupos" ) ?></h2><br>
					
					<?php
					
					foreach( $dataProvider as $dP )
					{
						//Si el grupo no tiene registro no se muestra
						if( $dP->getTotalCount() > 0 )
						{
						
							echo  DataTables::widget([
								'dataProvider' => $dP,
								'clientOptions' => [
									'language'=>[
											'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
										],
									"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
									"info"=>false,
									"responsive"=>true,
									"dom"=> 'lfTrtip',
									"tableTools"=>[
										"aButtons"=> [  
											[
											"sExtends"=> "csv",
											"sButtonText"=> Yii::t('app',"CSV")
											],
											[
											"sExtends"=> "xls",
											"oSelectorOpts"=> ["page"=> 'current']
											],
											[
											"sExtends"=> "pdf",
											"sButtonText"=> Yii::t('app',"PDF")
											],
										],
									],
								],
								'columns' => 
								[
									['class' => 'yii\grid\SerialColumn'],
									[
										'attribute' => 'identificacion',
										'label'		=> 'Documento',
									],
									[
										'attribute' => 'nombre',
										'label'		=> 'Nombre',
									],
									[
										'attribute' => 'domicilio',
										'label'		=> 'Dirección',
									],
									[
										'attribute' => 'grupo',
										'label'		=> 'Grado',
										'value'		=> function( $model ){
											list( $grado, $grupo ) = explode( "-", $model[ 'grupo' ] );
											return $grado;
										},
									],
									[
										'attribute' => 'grupo',
										'label'		=> 'Grupo',
										'value'		=> function( $model ){
											list( $grado, $grupo ) = explode( "-", $model[ 'grupo' ] );
											return $grupo;
										},
									],
									[
										'attribute' => 'puesto',
										'label'		=> 'Puesto',
									],
								],
							]);
							
							echo "<br>";
							echo "<br>";
						}
					}
					
				break;
				
				case 8:
				
					?>
						<h2><?= Html::encode( "Cantidad de estudiantes por grado" ) ?></h2><br>
					<?php
				
					echo  DataTables::widget([
						'dataProvider' => $dataProviderCantidad,
						'clientOptions' => [
							'language'=>[
									'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
								],
							"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
							"info"=>false,
							"responsive"=>true,
							"dom"=> 'lfTrtip',
							"tableTools"=>[
								"aButtons"=> [  
									[
									"sExtends"=> "csv",
									"sButtonText"=> Yii::t('app',"CSV")
									],
									[
									"sExtends"=> "xls",
									"oSelectorOpts"=> ["page"=> 'current']
									],
									[
									"sExtends"=> "pdf",
									"sButtonText"=> Yii::t('app',"PDF")
									],
								],
							],
						],
						'columns' => 
						[
							// ['class' => 'yii\grid\SerialColumn'],
							
							[
								'attribute' => 'genero',
								'label'		=> '',
							],
							[
								'attribute' => 'cantidad',
								'label'		=> '',
							],
							
							
						],
					]);
					
					
					echo  DataTables::widget([
						'dataProvider' => $dataProvider,
						'clientOptions' => [
							'language'=>[
									'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
								],
							"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
							"info"=>false,
							"responsive"=>true,
							"dom"=> 'lfTrtip',
							"tableTools"=>[
								"aButtons"=> [  
									[
									"sExtends"=> "csv",
									"sButtonText"=> Yii::t('app',"CSV")
									],
									[
									"sExtends"=> "xls",
									"oSelectorOpts"=> ["page"=> 'current']
									],
									[
									"sExtends"=> "pdf",
									"sButtonText"=> Yii::t('app',"PDF")
									],
								],
							],
						],
						'columns' => 
						[
							['class' => 'yii\grid\SerialColumn'], 
							[
								'attribute' => 'identificacion',
								'label'		=> 'Documento',
							],
							[
								'attribute' => 'nombres',
								'label'		=> 'Nombre',
							],
							[
								'attribute' => 'domicilio',
								'label'		=> 'Dirección',
							],
							'genero',
							[
								'attribute' => 'descripcion',
								'label'		=> 'Jornada',
							],

						],
					]); 
				break; //fin case 8
				
				case 9:
				?>
					 
					<h2><?= Html::encode( "Cantidad de estudiantes por Grado - Desempeño" ) ?></h2><br>
					
					<?php
					
					foreach( $dataProvider as $dP )
					{
						//Si el grupo no tiene registro no se muestra
						if( $dP->getTotalCount() > 0 )
						{
						
							echo  DataTables::widget([
								'dataProvider' => $dP,
								'clientOptions' => [
									'language'=>[
											'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
										],
									"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
									"info"=>false,
									"responsive"=>true,
									"dom"=> 'lfTrtip',
									"tableTools"=>[
										"aButtons"=> [  
											[
											"sExtends"=> "csv",
											"sButtonText"=> Yii::t('app',"CSV")
											],
											[
											"sExtends"=> "xls",
											"oSelectorOpts"=> ["page"=> 'current']
											],
											[
											"sExtends"=> "pdf",
											"sButtonText"=> Yii::t('app',"PDF")
											],
										],
									],
								],
								'columns' => 
								[
									['class' => 'yii\grid\SerialColumn'],
									[
										'attribute' => 'identificacion',
										'label'		=> 'Documento',
									],
									[
										'attribute' => 'nombre',
										'label'		=> 'Nombre',
									],
									[
										'attribute' => 'domicilio',
										'label'		=> 'Dirección',
									],
									[
										'attribute' => 'grupo',
										'label'		=> 'Grado',
										// 'value'		=> function( $model ){
											// return $model[ 'grupo' ];
										// },
									],
									[
										'attribute' => 'puesto',
										'label'		=> 'Puesto',
									],
								],
							]);
							
							echo "<br>";
							echo "<br>";
						}
					}
					
				break;
		}
		
		?>
	
</div>
