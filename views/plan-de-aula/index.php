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
				'attribute' => 'id_perfiles_x_personas_docentes',
				'label'		=> 'Docente',
				'value' 	=> function( $model ){
									$personas = Personas::find()
													->select( "d.id_perfiles_x_personas as id, ( personas.nombres || ' ' || personas.apellidos ) nombres" )
													->innerJoin('perfiles_x_personas pf', 'personas.id=pf.id_personas' )
													->innerJoin('docentes d', 'd.id_perfiles_x_personas=pf.id' )
													->where( 'personas.estado=1' )
													->where( 'd.estado=1' )
													->where( 'd.id_perfiles_x_personas='.$model->id_perfiles_x_personas_docentes )
													->one();
									return $personas ? $personas->nombres: '';
								},
				'filter' 	=> ArrayHelper::map( Personas::find()
													->select( "d.id_perfiles_x_personas as id, ( personas.nombres || ' ' || personas.apellidos ) nombres" )
													->innerJoin('perfiles_x_personas pf', 'pf.id_personas=personas.id' )
													->innerJoin('docentes d', 'd.id_perfiles_x_personas=pf.id' )
													->where( 'personas.estado=1' )
													->where( 'd.estado=1' )
													->all(), 'id', 'nombres' ),
			],
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
