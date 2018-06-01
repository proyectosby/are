<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SancionesEstudiantes */

$this->title = 'Actualizar Sanciones Estudiantes';
$this->params['breadcrumbs'][] = ['label' => 'Sanciones Estudiantes', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="sanciones-estudiantes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'estudiantes'=>$estudiantes,
		'estados'=>$estados,
    ]) ?>

</div>
