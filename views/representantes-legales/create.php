<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PerfilesXPersonas */

$this->title = 'Agregar estudiante: ';
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfiles-xpersonas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 					=> $model,
		'personas' 					=> $personas,
		'modelRepresentantesLegales'=> $modelRepresentantesLegales,
		'representantesLegales'		=> $personas,
    ]) ?>

</div>
