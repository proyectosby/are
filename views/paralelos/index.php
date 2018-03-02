<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\SedesJornadas;
use yii\helpers\ArrayHelper;
use app\models\Sedes;
use app\models\Jornadas;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paralelos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paralelos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Paralelos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'descripcion',
			[
				'attribute'=>'id_sedes_jornadas',
				'value' => function( $model ){
					$sedesJornadas = SedesJornadas::findOne($model->id_sedes_jornadas);
					//sedes
					
					$idSede = $sedesJornadas ? $sedesJornadas->id_sedes : '';
					$idSede =(int) $idSede;
					$sedes = Sedes::findOne($model->id=$idSede);
					$sedes= $sedes ? $sedes->descripcion : '';
					//sedes
					
					//Jornadas
					$idJornada = $sedesJornadas ? $sedesJornadas->id_jornadas : '';
					$idJornada = (int)$idJornada;
					$jornadas = Jornadas::findOne($model->id= $idJornada);
					$jornadas= $jornadas ? $jornadas->descripcion : '';
					//Jornadas
					
					
					return  $sedes." - ".$jornadas;	
				},
				
			],
            
            'id_sedes_niveles',
            'ano_lectivo',
            //'fecha_ingreso',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
