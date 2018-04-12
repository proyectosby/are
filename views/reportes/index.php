<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

use app\models\Sedes;
use app\models\Instituciones;

use yii\widgets\ActiveForm;

use yii\bootstrap\Button;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AsginaturasBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

/**********
Versión: 001
Fecha: 10-03-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de reportes
---------------------------------------
Modificaciones:
Fecha: 05-04-2018
Persona encargada: Edwin Molina Grisales
Cambios realizados: - Se agrega opción Porcentaje ocupacion aulas
---------------------------------------
Fecha: 10-03-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - moficacion  del index para mostrar botones de los reportes
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
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
                
    </p>

    <div class="reportes-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
       <?= Html::a('Cantidad de estudiantes por IEO', 
								[
									'reportes',
									'idReporte'	=> 1,
									'idSedes' 		=> $idSedes,
									'idInstitucion' => $idInstitucion, 
								], 
								['class' => 'btn btn-success'
		]) ?>
		
		 <?= Html::a('Cantidad de estudiantes por Grado', 
								[
									'reportes',
									'idReporte'		=> 2,
									'idSedes' 		=> $idSedes,
									'idInstitucion' => $idInstitucion, 
								], 
								['class' => 'btn btn-success'
		]) ?> 
		
		<?= Html::a('Cantidad de Estudiantes por Grupo', 
								[
									
									'reportes',
									'idReporte'		=> 3,
									'idSedes' 		=> $idSedes,
									'idInstitucion' => $idInstitucion, 
								], 
								['class' => 'btn btn-success'
		]) ?>
		
		<?= Html::a('Porcentaje ocupación aulas', 
								[
									'reportes',
									'idReporte'		=> 4,
									'idSedes' 		=> $idSedes,
									'idInstitucion' => $idInstitucion, 
								], 
								['class' => 'btn btn-success'
		]) ?>
		
		
    </div>

    <div class="form-group">
		<?= Html::a('Tasa de cobertura bruta', 
									[
										'reportes',
										'idReporte'		=> 5,
										'idSedes' 		=> $idSedes,
										'idInstitucion' => $idInstitucion, 
									], 
									['class' => 'btn btn-success']) ?>
									
									
		<?= Html::a('Tasa de cobertura bruta', 
									[
										'reportes',
										'idReporte'		=> 6,
										'idSedes' 		=> $idSedes,
										'idInstitucion' => $idInstitucion, 
									], 
									['class' => 'btn btn-success']) ?>

    

</div>


</div>
<?php ActiveForm::end(); ?>