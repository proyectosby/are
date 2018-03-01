<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SedesJornadas */

$this->title = 'Actualizar jornada:';
$this->params['breadcrumbs'][] = ['label' => 'Sedes Jornadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sedes-jornadas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 	=> $model,
        'sedes' 	=> $sedes,
        'jornadas' 	=> $jornadas,
    ]) ?>

</div>
