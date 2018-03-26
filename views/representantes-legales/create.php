<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RepresentantesLegales */

$this->title = 'Create Representantes Legales';
$this->params['breadcrumbs'][] = ['label' => 'Representantes Legales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="representantes-legales-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
