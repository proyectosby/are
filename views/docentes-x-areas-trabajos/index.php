<?php

/**********
Versión: 001
Fecha: 27-03-2018
Desarrollador: Edwin Molina Grisales
Descripción: CRUD Dcoentes por áreas de trabajo
---------------------------------------
Modificaciones:
Fecha: 27-03-2018
Persona encargada: Edwin Molina Grisales
Se corrige los queries respectivos, ya que se repetía varias veces los metodos ->where() en una sola consulta
---------------------------------------
**********/

use yii\helpers\Html;
use yii\grid\GridView;


use app\models\Personas;
use app\models\AreasTrabajos;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocentesXAreasTrabajosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docentes por áreas  de trabajo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docentes-xareas-trabajos-index">

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
													->andWhere( 'd.estado=1' )
													->andWhere( 'd.id_perfiles_x_personas='.$model->id_perfiles_x_personas_docentes )
													->one();
									return $personas ? $personas->nombres: '';
								},
				'filter' 	=> ArrayHelper::map( Personas::find()
													->select( "d.id_perfiles_x_personas as id, ( personas.nombres || ' ' || personas.apellidos ) nombres" )
													->innerJoin('perfiles_x_personas pf', 'pf.id_personas=personas.id' )
													->innerJoin('docentes d', 'd.id_perfiles_x_personas=pf.id' )
													->where( 'personas.estado=1' )
													->andWhere( 'd.estado=1' )
													->all(), 'id', 'nombres' ),
			],
			[
				'attribute' => 'id_areas_trabajos',
				'value' 	=> function( $model ){
									$areasTrabajo = AreasTrabajos::findOne($model->id_areas_trabajos);
									return $areasTrabajo ? $areasTrabajo->descripcion: '';
								},
				'filter' 	=> ArrayHelper::map( AreasTrabajos::find()->all(), 'id', 'descripcion' ),
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
