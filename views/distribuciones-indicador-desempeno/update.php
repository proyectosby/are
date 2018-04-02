<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DistribucionesIndicadorDesempeno */

$this->title = 'Modificar Distribuciones Indicador Desempeño';
$this->params['breadcrumbs'][] = ['label' => 'Distribuciones Indicador Desempeños', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="distribuciones-indicador-desempeno-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'distribuciones' => $distribuciones,
		'indicadores'=>$indicadores,
		'estados'=>$estados,
    ]) ?>

</div>
