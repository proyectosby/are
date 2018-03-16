<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AsignaturasNivelesSedes */

$this->title = 'Agregar Asignaturas Niveles Sedes';
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas Niveles Sedes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignaturas-niveles-sedes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'idSedes'=>0,
    ]) ?>

</div>
