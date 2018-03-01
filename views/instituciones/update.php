<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Instituciones */

$this->title = 'Actualizar Institución:';
$this->params['breadcrumbs'][] = ['label' => 'Instituciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="instituciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 			=> $model,
		'estados' 			=> $estados,
		'sectores' 			=> $sectores,
		'tipoInstituciones' => $tipoInstituciones,
    ]) ?>

</div>
