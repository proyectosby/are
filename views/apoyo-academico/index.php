<?php
if(@$_SESSION['sesion']=="si")
{ 
	// echo $_SESSION['nombre'];
} 
//si no tiene sesion se redirecciona al login
else
{
	echo "<script> window.location=\"index.php?r=site%2Flogin\";</script>";
	die;
}/**********
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
use yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;


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

$this->title = 'Apoyo Académico ';
$this->params['breadcrumbs'][] = 
	[
		'label' => $this->title,
		'url' => [	'index'	 ]
	];
	
?>
<div class="apoyo-academico-index">

    <h1><?= Html::encode($nombreSede) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        
	<?php  
	$sql ="
		SELECT (select descripcion from tipos_identificaciones where id = p.id_tipos_identificaciones) as documento, p.identificacion as \"No Documento\",
		p.nombres as nombre, p.apellidos as apellido,i.descripcion as \"Institucion Educativa\", s.descripcion as sede
		FROM personas as p, perfiles_x_personas as pp, instituciones as i, sedes as s, estudiantes as e, paralelos as pa, sedes_jornadas as sj
		Where pp.id_personas = p.id
		and pp.id = $idEstudiante
		and e.id_perfiles_x_personas = pp.id
		and e.id_paralelos = pa.id
		and pa.id_sedes_jornadas = sj.id
		and sj.id_sedes = s.id
		and s.id_instituciones = i.id
		";		
		$data= new SqlDataProvider([
				'sql' => $sql,
				
			]);
	
	echo  DataTables::widget([
        'dataProvider' => $data,
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
            'documento',
			'No Documento',
			'nombre',
            'apellido',
            'Institucion Educativa',
            'sede',
        ],
		 
    ]); ?>
    </p>
	
	<p>
	<?= Html::a('Agregar Apoyo Academico', [
									'create',
									'idEstudiante'	=> $idEstudiante,
									
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
			'paralelo',
			'jornada',
            'motivo_consulta',
			'remitido_eps:boolean',
			'incapacidad:boolean',
            'fecha_entrada',
            'hora_entrada',
            'persona_doctor',
			'consecutivo',

            ['class' => 'yii\grid\ActionColumn'],
			
        ],
		 
    ]); ?>
</div>
