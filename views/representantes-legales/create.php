<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RepresentantesLegales */

$this->title = 'Agregar';
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="representantes-legales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'estudiantes'=>$estudiantes,
		'representantesLegales'=>$representantesLegales,
		'modelRepresentantesLegales'=> $modelRepresentantesLegales,
		'estudianteSelected'=>0,
		'representantesLegalesSelected'=>0,
    ]) ?>

</div>
