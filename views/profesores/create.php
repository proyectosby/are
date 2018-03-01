<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Profesores */

$this->title = 'Create Profesores';
$this->params['breadcrumbs'][] = ['label' => 'Profesores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profesores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
