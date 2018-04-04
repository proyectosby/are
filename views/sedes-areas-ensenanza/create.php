<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SedesAreasEnsenanza */

$this->title = 'Agregar Áreas de Enseñanza';
$this->params['breadcrumbs'][] = [
									'label' => 'Sedes Areas Enseñanzas', 
									'url' 	=> [
													'index', 
													'idInstitucion'	=> $modelInstitucion->id, 
													'idSedes'		=> $modelSedes->id 
												]
								];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sedes-areas-ensenanza-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'sedes' => $sedes,
        'areas'	=> $areas,
    ]) ?>

</div>
