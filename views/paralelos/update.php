<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Paralelos */

$this->title = $model->descripcion;
// $this->params['breadcrumbs'][] = ['label' => 'Paralelos', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
// $this->params['breadcrumbs'][] = 'Modificar';

$this->params['breadcrumbs'][] = [
									'label' => 'Paralelos', 
									'url' => [
												'index',
												'idInstitucion' => $idInstituciones, 
												'idSedes' 		=> $idSedes,
											 ]
								 ];
								 
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="paralelos-update">

    <h1><?= Html::encode('Modificar') ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'jornadas'=>$jornadas,
		'niveles'=>$niveles,
		'estados'=>$estados,
    ]) ?>

</div>
