<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PersonasFormaciones */

$this->title = 'Create Personas Formaciones';
$this->params['breadcrumbs'][] = ['label' => 'Personas Formaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-formaciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
