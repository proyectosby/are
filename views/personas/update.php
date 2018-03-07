<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Personas */

$this->title = 'Modificar: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="personas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'identificaciones'=>$identificaciones,
		'estados'=>$estados, 	 	 	
		'generos'=>$generos, 	 	 	
		'estadosCiviles'=>$estadosCiviles,
		'municipios'=>$municipios,
		'barriosVeredas'=>$barriosVeredas,

</div>
