<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonasDiscapacidades */

$this->title = 'Update Personas Discapacidades: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Personas Discapacidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_personas, 'url' => ['view', 'id_personas' => $model->id_personas, 'id_tipos_discapacidades' => $model->id_tipos_discapacidades]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personas-discapacidades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>