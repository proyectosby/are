<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SedesBloques */

$this->title = 'Create Sedes Bloques';
$this->params['breadcrumbs'][] = ['label' => 'Sedes Bloques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sedes-bloques-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
