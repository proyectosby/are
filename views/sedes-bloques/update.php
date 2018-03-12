<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SedesBloques */

$this->title = 'Update Sedes Bloques: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Sedes Bloques', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sedes-bloques-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
