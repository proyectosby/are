<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mascotas */

$this->title = 'Create Mascotas';
$this->params['breadcrumbs'][] = ['label' => 'Mascotas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mascotas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
