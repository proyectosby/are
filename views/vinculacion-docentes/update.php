<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VinculacionDocentes */

$this->title = 'Modificar la vinculación del docente:';
$this->params['breadcrumbs'][] = ['label' => 'Vinculacion Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vinculacion-docentes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 			=> $model,
		'estados' 			=> $estados,
		'personas' 			=> $personas,
		'tiposContratos' 	=> $tiposContratos,
    ]) ?>

</div>
