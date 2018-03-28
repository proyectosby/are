<?php

use yii\helpers\Html;
use yii\grid\GridView;


use app\models\Personas;
use app\models\Periodos;
use app\models\Niveles;
use app\models\Asignaturas;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanDeAulaBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Plan de aulas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-de-aula-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
				'attribute' => 'id_periodo',
				'value' 	=> function($model){
									$periodo = Periodos::find()->where( 'id='.$model->id_periodo )->one();
									return $periodo ? $periodo->descripcion : '';
							   },
				'filter' 	=> ArrayHelper::map( Periodos::find()->all(), 'id', 'descripcion' ),
			],
			[
				'attribute' => 'id_nivel',
				'value' 	=> function($model){
									$nivel = Niveles::find()->where( 'id='.$model->id_nivel )->one();
									return $nivel ? $nivel->descripcion : '';
							   },
				'filter' 	=> ArrayHelper::map( Niveles::find()->all(), 'id', 'descripcion' ),
			],
			[
				'attribute' => 'id_asignatura',
				'value' 	=> function($model){
									$nivel = Asignaturas::find()->where( 'id='.$model->id_asignatura )->one();
									return $nivel ? $nivel->descripcion : '';
							   },
				'filter' 	=> ArrayHelper::map( Asignaturas::find()->all(), 'id', 'descripcion' ),
			],
            'fecha',
            //'actividad',
            //'observaciones',
            //'evaluativa:boolean',
            //'estado',
			//'id_indicador_desempeno', 
			//'cognitivo_conocer:boolean', 
			//'cognitivo_hacer:boolean', 
			//'cognitivo_ser:boolean', 
			//'personal:boolean', 
			//'social:boolean', 

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
