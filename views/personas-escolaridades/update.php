<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonasEscolaridades */

$this->title = 'Update Personas Escolaridades: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Personas Escolaridades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personas-escolaridades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
