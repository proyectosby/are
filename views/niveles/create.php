<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Niveles */

$this->title = 'Agregar';
$this->params['breadcrumbs'][] = ['label' => 'Niveles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="niveles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
