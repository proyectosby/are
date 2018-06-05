<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SancionesEstudiantes */

$this->title = 'Agregar Sanciones Estudiantes';
$this->params['breadcrumbs'][] = ['label' => 'Sanciones Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sanciones-estudiantes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'estudiantes'=>$estudiantes,
		'estados'=>$estados,
    ]) ?>

</div>
