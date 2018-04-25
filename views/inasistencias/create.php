<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Inasistencias */

$this->title = 'Create Inasistencias';
$this->params['breadcrumbs'][] = ['label' => 'Inasistencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inasistencias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
