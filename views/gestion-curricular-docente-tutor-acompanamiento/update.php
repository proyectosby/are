<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GestionCurricularDocenteTutorAcompanamiento */

$this->title = 'Actualizar Gestión Curricular Docente Tutor Acompañamientos ';
$this->params['breadcrumbs'][] = ['label' => 'Gestión Curricular Docente Tutor Acompañamientos ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = "Actualizar";
?>
<div class="gestion-curricular-docente-tutor-acompanamiento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
