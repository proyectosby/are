<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Docentes */

$this->title = 'Modificar docente: ';
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_perfiles_x_personas, 'url' => ['view', 'id' => $model->id_perfiles_x_personas]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="docentes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 	  => $model,
		'personas' 	  => $personas,
		'escalafones' => $escalafones,
		'estados' 	  => $estados,
    ]) ?>

</div>
