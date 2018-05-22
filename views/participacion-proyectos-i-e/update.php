<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ParticipacionProyectosIE */

$this->title = 'Modificar: ';
$this->params['breadcrumbs'][] = ['label' => 'Participacion Proyectos Ies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="participacion-proyectos-ie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'idInstitucion' 	=> $idInstitucion,
		'estados' 			=> $estados,
        'nombresProyectos'	=> $nombresProyectos,
		'institucion' 		=> $institucion,
    ]) ?>

</div>
