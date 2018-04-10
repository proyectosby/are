<?php

/**********
Versión: 001
Fecha: 10-04-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD Recursos Infraestructura Fisica
---------------------------------------
Modificaciones:
Fecha: 10-04-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - Miga de pan
---------------------------------------
**********/

use yii\helpers\Html;
use app\models\Sedes;
use	yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\RecursosInfraestructuraFisica */

$idSedes = $model->id_sede;
$nombreSede = new Sedes();
$nombreSede = $nombreSede->find()->where('id='.$idSedes)->all();
$idInstitucion = ArrayHelper::map($nombreSede,'id','id_instituciones');
$idInstitucion = $idInstitucion[$idSedes];

$nombreSede = ArrayHelper::map($nombreSede,'id','descripcion');
$nombreSede = $nombreSede[$idSedes];


$this->title = "Actualizar";
$this->params['breadcrumbs'][] = [
								'label' => 'Asignaturas', 
								'url' => [
											'index',
											'idInstitucion' => $idInstitucion, 
											'idSedes' 		=> $model->id_sede,
										 ]
							 ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recursos-infraestructura-fisica-update">

    <h1><?= Html::encode($nombreSede) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'idSedes'=>$idSedes,
    ]) ?>

</div>
