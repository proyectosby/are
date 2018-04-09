<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RecursosInfraestructuraFisica */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Recursos Infraestructura Fisicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recursos-infraestructura-fisica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
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
            'cantidad_aulas_regulares',
            'cantidad_aulas_multiples',
            'cantidad_oficinas_admin',
            'cantidad_aulas_profesores',
            'cantidad_espacios_deportivos',
            'cantidad_baterias_sanitarias',
            'cantidad_laboratorios',
            'cantidad_portatiles',
            'cantidad_computadores',
            'cantidad_tabletas',
            'cantidad_bibliotecas_salas_lectura',
            'programas_informaticos_admin',
        ],
    ]) ?>

</div>
