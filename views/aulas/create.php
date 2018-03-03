<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Instituciones */

$this->title = 'Agregar Institución';
$this->params['breadcrumbs'][] = ['label' => 'Instituciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instituciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
			'model'				=> $model,
			'estados' 			=> $estados,
			'sectores' 			=> $sectores,
			'tipoInstituciones' => $tipoInstituciones,
    ]) ?>

</div>
