<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Asignaturas */

$this->title = 'Create Asignaturas';
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignaturas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
