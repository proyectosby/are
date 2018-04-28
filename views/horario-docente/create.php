<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HorarioDocente */

$this->title = 'Create Horario Docente';
$this->params['breadcrumbs'][] = ['label' => 'Horario Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horario-docente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
