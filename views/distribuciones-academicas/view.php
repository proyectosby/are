<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DistribucionesAcademicas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Distribuciones Academicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribuciones-academicas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_asignaturas_x_niveles_sedes',
            'id_perfiles_x_personas_docentes',
            'id_aulas_x_sedes',
            'fecha_ingreso',
            'estado',
        ],
    ]) ?>

</div>
