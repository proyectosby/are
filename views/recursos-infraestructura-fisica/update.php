<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecursosInfraestructuraFisica */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Recursos Infraestructura Fisicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="recursos-infraestructura-fisica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
