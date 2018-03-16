<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Personas;
use app\models\Periodos;
use app\models\Niveles;
use app\models\Asignaturas;
use app\models\Estados;

/* @var $this yii\web\View */
/* @var $model app\models\PlanDeAula */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Plan De Aulas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-de-aula-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Está seguro que desea eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
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
			],
            [
				'attribute' => 'id_periodo',
				'value' 	=> function($model){
									$periodo = Periodos::find()->where( 'id='.$model->id_periodo )->one();
									return $periodo ? $periodo->descripcion : '';
							   },
			],
			[
				'attribute' => 'id_nivel',
				'value' 	=> function($model){
									$nivel = Niveles::find()->where( 'id='.$model->id_nivel )->one();
									return $nivel ? $nivel->descripcion : '';
							   },
			],
			[
				'attribute' => 'id_asignatura',
				'value' 	=> function($model){
									$nivel = Asignaturas::find()->where( 'id='.$model->id_asignatura )->one();
									return $nivel ? $nivel->descripcion : '';
							   },
			],
            'actividad',
            'observaciones',
            'evaluativa:boolean',
            [
				'attribute' => 'estado',
				'value' 	=> function($model){
									$nivel = Estados::find()->where( 'id='.$model->estado )->one();
									return $nivel ? $nivel->descripcion : '';
							   },
			],
        ],
    ]) ?>

</div>
