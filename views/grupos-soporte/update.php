<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GruposSoporte */

$this->title = 'Modificar Grupos Soporte';

$this->params['breadcrumbs'][] = [
									'label' => 'Grupos Soportes', 
									'url' => [
												'index',
												'idInstitucion' => $idInstitucion, 
												'idSedes' 		=> $idSedes,
											 ]
								 ];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="grupos-soporte-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'tipoGruposSoporte' => $tipoGruposSoporte,
        'sedes' => $sedes,
        'sedesJornadas' => $sedesJornadas,
        'docentes' => $docentes,
        'estados' => $estados,
    ]) ?>

</div>
