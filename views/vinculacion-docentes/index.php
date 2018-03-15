<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Personas;
use app\models\TiposContratos;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VinculacionDocentesBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vinculación Docentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vinculacion-docentes-index">

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
            'resolucion_numero',
            'resolucion_desde',
            'antiguedad',
			[
				'attribute' => 'id_tipos_contratos',
				'value' 	=> function( $model ){
									$tiposContrato = TiposContratos::findOne( $model->id_tipos_contratos);
									return $tiposContrato ? $tiposContrato->descripcion: '';
								},
				'filter' 	=> ArrayHelper::map( TiposContratos::find()->all(), 'id', 'descripcion' ),
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
