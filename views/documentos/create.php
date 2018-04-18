<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Documentos */

$this->title = 'Agregar Documento';
$this->params['breadcrumbs'][] = ['label' => 'Documentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documentos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 		=> $model,
        'tiposDocumento'=> $tiposDocumento,
        'personas' 		=> $personas,
		'estados' 		=> $estados,
    ]) ?>

</div>
