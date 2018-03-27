<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PlanDeAula */

$this->title = 'Agregar plan de aula:';
$this->params['breadcrumbs'][] = ['label' => 'Plan De Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-de-aula-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'personas' 				=> $personas,
		'periodos'				=> $periodos,
		'niveles' 				=> $niveles,
		'asignaturas' 			=> $asignaturas,
		'estados' 				=> $estados,
		'indicadorDesempenos'	=> $indicadorDesempenos,
    ]) ?>

</div>
