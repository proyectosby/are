<?php

use yii\helpers\Html;
use app\models\Instituciones;

$nombreInstitucion = Instituciones::find()->where(['id' => $idInstitucion])->one();
$nombreInstitucion = $nombreInstitucion->descripcion;
/* @var $this yii\web\View */
/* @var $model app\models\InfraestructuraEducativa */
$this->title = $nombreInstitucion ;

$this->params['breadcrumbs'][] = 
	[
		'label' => 'Infraestructura Educativa', 
		'url' => [
					'index',
					'idInstitucion' => $idInstitucion, 
				 ]
	];	
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="infraestructura-educativa-update">

    <h1><?= Html::encode("Actualizar Infraestructura Educativa") ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'sedes'=> $sedes,
		'estados'=>$estados,
		'idInstitucion'=>$idInstitucion,
    ]) ?>

</div>

