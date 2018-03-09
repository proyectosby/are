<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PersonasFormaciones */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Personas Formaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-formaciones-view">

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
            'id_personas',
            'id_tipos_formaciones',
            'horas_curso',
            'ano_curso',
            'titulacion:boolean',
            'titulo',
            'institucion',
            'id',
        ],
    ]) ?>

</div>
