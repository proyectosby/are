<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SedesNiveles */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sedes Niveles', 'url' => ['index', 'idSedes' => $modelSedes->id, 'idInstitucion' => $modelInstitucion->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sedes-niveles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
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
            'id_niveles',
            'id_sedes',
        ],
    ]) ?>

</div>
