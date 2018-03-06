<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Periodos */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Periodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';


?>
<div class="periodos-update">

    <h1><?= Html::encode($this->title)?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'estados' =>$estados,
    ]) ?>

</div>
