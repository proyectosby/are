<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PersonasDiscapacidades */

$this->title = $model->id_personas;
$this->params['breadcrumbs'][] = ['label' => 'Personas Discapacidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-discapacidades-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_personas' => $model->id_personas, 'id_tipos_discapacidades' => $model->id_tipos_discapacidades], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_personas' => $model->id_personas, 'id_tipos_discapacidades' => $model->id_tipos_discapacidades], [
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
            'id_tipos_discapacidades',
            'descripcion:ntext',
        ],
    ]) ?>

</div>
