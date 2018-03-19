<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilesXPersonas */

$this->title = 'Modificar estudiante:';
$this->params['breadcrumbs'][] = ['label' => 'Estudiante', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perfiles-xpersonas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 					=> $model,
		'modelRepresentantesLegales'=> $modelRepresentantesLegales,
		'personas' 					=> $personas,
		'representantesLegales'		=> $representantesLegales,
    ]) ?>

</div>
