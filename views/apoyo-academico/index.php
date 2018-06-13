<?php
/**********
Versión: 001
Fecha: 16-04-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de Apoyo Academico
---------------------------------------
Modificaciones:
Fecha: 16-04-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - se renombran los labels del boton
de GridView a dataTable

---------------------------------------
**********/
use app\models\TiposApoyoAcademico;
use app\models\Sedes;
use	yii\helpers\ArrayHelper;


$nombreTiposApoyoAcademico = TiposApoyoAcademico::find()->where(['id' => $AAcademico])->one();


$nombreSede = new Sedes();
$nombreSede = $nombreSede->find()->where('id='.$idSedes)->all();
$nombreSede = ArrayHelper::map($nombreSede,'id','descripcion');
$nombreSede = $nombreSede[$idSedes];

use yii\helpers\Html;
use yii\grid\GridView;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApoyoAcademicoBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apoyo Académico - '.$nombreTiposApoyoAcademico->descripcion;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apoyo-academico-index">

    <h1><?= Html::encode($nombreSede) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar', [
									'create',
									'idSedes' 		=> $idSedes,
									'idInstitucion' => $idInstitucion,
									'AAcademico' 	=>$AAcademico,
								], 
								['class' => 'btn btn-success'
		]) ?>
    </p>
 <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
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
				// [
				// "sExtends"=> "copy",
				// "sButtonText"=> Yii::t('app',"Copiar")
				// ],
				// [
				// "sExtends"=> "csv",
				// "sButtonText"=> Yii::t('app',"CSV")
				// ],
				[
				"sExtends"=> "xls",
				"oSelectorOpts"=> ["page"=> 'current']
				],
				[
				"sExtends"=> "pdf",
				"oSelectorOpts"=> ["page"=> 'current']
				],
				// [
				// "sExtends"=> "print",
				// "sButtonText"=> Yii::t('app',"Imprimir")
				// ],
			],
		 ],
	],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
			[
				'attribute'=>'id_persona_doctor',
				'value' => function( $model )
				{
					/**
					* Llenar nombre del docente
					*/
					//variable con la conexion a la base de datos 
					$connection = Yii::$app->getDb();
					$command = $connection->createCommand("
					SELECT pp.id, concat(pe.nombres,' ',pe.apellidos) as nombres
					FROM public.perfiles_x_personas as pp, public.personas as pe
					where pp.id_personas = pe.id
					and pp.id =$model->id_persona_doctor
					");
					$result = $command->queryAll();
					
					return $result[0]['nombres'];
				},
				
			],
            // 'registro',
			[
				'attribute'=>'id_persona_estudiante',
				'value' => function( $model )
				{
					/**
					* Llenar nombre del docente
					*/
					//variable con la conexion a la base de datos 
					$connection = Yii::$app->getDb();
					$command = $connection->createCommand("
					SELECT es.id_perfiles_x_personas, concat(pe.nombres,' ',pe.apellidos) as nombres
					FROM public.estudiantes as es, public.perfiles_x_personas as pp, public.personas as pe
					where es.id_perfiles_x_personas = pp.id
					and pp.id_personas = pe.id
					and es.id_perfiles_x_personas =$model->id_persona_estudiante
					");
					$result = $command->queryAll();
					
					return $result[0]['nombres'];
				},
				
			],
            'motivo_consulta',
            'fecha_entrada',
            'hora_entrada',
            'fecha_salida',
            'hora_salida',
            //'incapacidad:boolean',
            //'no_dias_incapaciad',
            //'discapacidad:boolean',
            //'observaciones',
            //'id_sede',
            //'id_tipo_apoyo',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
