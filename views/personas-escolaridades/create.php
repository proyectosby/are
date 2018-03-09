<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PersonasEscolaridades */

$this->title = 'Create Personas Escolaridades';
$this->params['breadcrumbs'][] = ['label' => 'Personas Escolaridades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-escolaridades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
