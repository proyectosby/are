<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PersonasDiscapacidades */

$this->title = 'Agregar';
$this->params['breadcrumbs'][] = ['label' => 'Personas Discapacidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-discapacidades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'personas' => $personas,
        'discapacidades' => $discapacidades,
    ]) ?>

</div>
