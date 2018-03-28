<?php

/**********
Versión: 001
Fecha: 14-03-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de Representantes Legales (estudiantes)
---------------------------------------
Modificaciones:
Fecha: 14-03-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - dataGrid a DataTables
nombres botones
Se oculta el campo id
Se muestra el nombre y apellidos de la persona en ambos campos
---------------------------------------
**********/
use yii\helpers\Html;
use yii\grid\GridView;
use	yii\helpers\ArrayHelper;

use app\models\Personas;
use	app\models\PerfilesXPersonas;
use fedemotta\datatables\DataTables;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RepresentantesLegalesBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="representantes-legales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			[
				'attribute'=>'id_perfiles_x_personas',
				'value' => function( $model )
				{
					//se busca el id_personas para pasarlo al modelo personas y mostrar el nombre y apellidos de la persona
					$PerfilesXPersonas = PerfilesXPersonas::findOne($model->id_perfiles_x_personas);
					$PerfilesXPersonas->id_personas;
					
					$personas = Personas::findOne($PerfilesXPersonas->id_personas);
					return $personas ? $personas->nombres." ".$personas->apellidos : '';
				},
			],
			[
				'attribute'=>'id_personas',
				'value' => function( $model )
				{
					$personas = Personas::findOne($model->id_personas);
					return $personas ? $personas->nombres." ".$personas->apellidos : '';
				},
			],
			
			
            ['class' => 'yii\grid\ActionColumn'],
        ]
    ]); ?>
</div>
