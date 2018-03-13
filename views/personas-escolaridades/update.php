<?php
/**********
Versión: 001
Fecha: Fecha en formato (12-03-2018)
Desarrollador: Viviana Rodas
Descripción: Vista modificar de Escolaridades
---------------------------------------
*/

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonasEscolaridades */

$this->title = 'Modificar: ';
$this->params['breadcrumbs'][] = ['label' => 'Personas Escolaridades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="personas-escolaridades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'personas' => $personas,
        'escolaridades' => $escolaridades,
    ]) ?>

</div>
