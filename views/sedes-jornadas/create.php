<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SedesJornadas */

$this->title = 'Agregar Jornada:';
$this->params['breadcrumbs'][] = ['label' => 'Sedes Jornadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sedes-jornadas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 	=> $model,
        'sedes' 	=> $sedes,
        'jornadas' 	=> $jornadas,
    ]) ?>

</div>
