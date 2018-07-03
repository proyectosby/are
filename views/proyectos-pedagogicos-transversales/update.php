<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectosPedagogicosTransversales */

$this->title = 'Update Proyectos Pedagogicos Transversales: ';
$this->params['breadcrumbs'][] = ['label' => 'Proyectos Pedagogicos Transversales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proyectos-pedagogicos-transversales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
