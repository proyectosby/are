<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Sedes;
use app\models\TiposAulas;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Aulas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aulas-view">

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
            'descripcion',
            'capacidad',
			[
				'attribute' => 'id_sedes',
				'value' => function( $model ){
					$sedes = Sedes::findOne($model->id_sedes);
					return $sedes ? $sedes->descripcion : '';
				},
				'filter' => ArrayHelper::map(Sedes::find()->all(), 'id', 'descripcion' ),
			],
			[
				'attribute' => 'id_tipos_aulas',
				'value' => function( $model ){
					$tiposAulas = TiposAulas::findOne($model->id_tipos_aulas);
					return $tiposAulas ? $tiposAulas->descripcion : '';
				},
				'filter' => ArrayHelper::map(Sedes::find()->all(), 'id', 'descripcion' ),
			],
        ],
    ]) ?>

</div>
