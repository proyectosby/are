<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Estados;
/* @var $this yii\web\View */
/* @var $model app\models\Periodos */

$this->title = "";
$this->params['breadcrumbs'][] = ['label' => 'Periodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'descripcion',
			[
				'attribute'=>'estado',
				'value' => function( $model )
				{
					$estados = Estados::findOne($model->estado);
					return $estados ? $estados->descripcion : '';
				},
				
			], 
            
        ],
    ]) ?>

</div>
