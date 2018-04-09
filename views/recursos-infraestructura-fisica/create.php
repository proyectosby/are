<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RecursosInfraestructuraFisica */

$this->title = 'Agregar';
$this->params['breadcrumbs'][] = ['label' => 'Recursos Infraestructura Fisicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recursos-infraestructura-fisica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
