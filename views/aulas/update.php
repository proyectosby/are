<?php
/**********
Versión: 001
Fecha: 02-03-2018
Desarrollador: Edwin Molina Grisales
Descripción: Vista para actualizar aulas
---------------------------------------
Modificaciones:
Fecha: 02-03-2018
Persona encargada: Edwin Molina Grisales
Cambios realizados: Se corrige la varibales tiposAulas, estaba con sedes
---------------------------------------
**********/


use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aulas */

$this->title = 'Actualizar aula';
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aulas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 	 => $model,
        'sedes' 	 => $sedes,
        'tiposAulas' => $tiposAulas,
    ]) ?>

</div>
