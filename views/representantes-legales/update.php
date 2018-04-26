<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RepresentantesLegales */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="representantes-legales-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'						=> $model,
		'estudiantes'				=> $estudiantes,
		'representantesLegales'		=> $representantesLegales,
		// 'modelRepresentantesLegales'=> $modelRepresentantesLegales,
    ]) ?>

</div>
