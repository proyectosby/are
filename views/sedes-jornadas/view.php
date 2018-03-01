<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SedesJornadas */

use app\models\Sedes;
use app\models\Jornadas;
use yii\helpers\ArrayHelper;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sedes Jornadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sedes-jornadas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Está seguro que quiere eliminar la jornada?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
			[
				'attribute' => 'id_jornadas',
				'value' => function( $model ){
					$jornadas = Jornadas::findOne($model->id_jornadas);
					return $jornadas ? $jornadas->descripcion : '';
				},
				'filter' => ArrayHelper::map(Jornadas::find()->all(), 'id', 'descripcion' ),
			],
			[
				'attribute' => 'id_sedes',
				'value' => function( $model ){
					$sedes = Sedes::findOne($model->id_sedes);
					return $sedes ? $sedes->descripcion : '';
				},
				'filter' => ArrayHelper::map(Sedes::find()->all(), 'id', 'descripcion' ),
			],
        ],
    ]) ?>

</div>
