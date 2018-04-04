<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SedesAreasEnsenanza */

$this->title = 'Modificar Área de Enseñanza';
$this->params['breadcrumbs'][] = [
									'label' => 'Sedes Areas Enseñanzas', 
									'url' => [
												'index',
												'idInstitucion' => $modelInstitucion->id,
												'idSedes' 		=> $modelSedes->id,
											]
								];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sedes-areas-ensenanza-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'sedes' => $sedes,
        'areas'	=> $areas,
    ]) ?>

</div>
