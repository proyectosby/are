<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RepresentantesLegales */

$this->title = 'Update Representantes Legales: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Representantes Legales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="representantes-legales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
