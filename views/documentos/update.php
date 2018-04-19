<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Documentos */

$this->title = 'Modificar Documento: ';
$this->params['breadcrumbs'][] = ['label' => 'Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="documentos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 		=> $model,
        'tiposDocumento'=> $tiposDocumento,
        'personas' 		=> $personas,
		'estados' 		=> $estados,
    ]) ?>

</div>
