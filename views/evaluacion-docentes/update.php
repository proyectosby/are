<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EvaluacionDocentes */

$this->title = 'Modificar evaluación del docente';
$this->params['breadcrumbs'][] = ['label' => 'Evaluacion Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="evaluacion-docentes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 		=> $model,
		'personas' 		=> $personas,
        'estados' 		=> $estados,
    ]) ?>

</div>
