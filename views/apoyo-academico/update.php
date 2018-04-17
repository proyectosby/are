<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ApoyoAcademico */

$this->title = 'Update Apoyo Academico: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Apoyo Academicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="apoyo-academico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
