<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\Sedes;
use app\models\SedesJornadas;
use app\models\Jornadas;
use app\models\Estados;

/* @var $this yii\web\View */
/* @var $model app\models\Paralelos */

// $this->title ="Detalle";
// $this->params['breadcrumbs'][] = ['label' => 'Paralelos', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;



$this->title = $model->descripcion;
$this->params['breadcrumbs'][] = [
									'label' => 'Paralelos', 
									'url' => [
												'index',
												'idInstitucion' => $idInstituciones, 
												'idSedes' 		=> $idSedes,
											 ]
								 ];
								 
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="paralelos-view">

    <h1><?= Html::encode('Ver') ?></h1>

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
				'attribute'=>'id_sedes_jornadas',
				'value'=> $jornadas,
			],
			[
				'attribute'=>'id_sedes_niveles',
				'value'=> $niveles,
			],
            'ano_lectivo',
            'fecha_ingreso',            
			[
				'attribute' => 'estado',
				'value' => function( $model ){
				$estados = Estados::findOne( $model->estado );
				return $estados ? $estados->descripcion : '';
				},
			],
        ],
    ]) ?>

</div>
