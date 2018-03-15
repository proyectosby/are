<?php
/**********
Versión: 001
Fecha: 14-03-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de AsignaturasNivelesSedes
---------------------------------------
Modificaciones:
Fecha: 14-03-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - se modifica lavista para que muestre el valor correspondiente no el id
---------------------------------------
**********/


use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;


use app\models\Asignaturas;
use app\models\SedesNiveles;
use app\models\Niveles;
use app\models\Sedes;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AsignaturasNivelesSedesBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asignaturas Niveles Sedes';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="asignaturas-niveles-sedes-index">

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
				'attribute'=>'id_sedes_niveles',
				'value' => function( $model )
				{
					//se buscan los id de los niveles y las sedes para mostrarlos en el index
					$sedesNiveles = SedesNiveles::find()->where('id='.$model->id_sedes_niveles)->all();
					$idNiveles = ArrayHelper::getColumn($sedesNiveles, 'id_niveles' );
					$idSedes = ArrayHelper::getColumn($sedesNiveles, 'id_sedes' );
					
					//nombre de la sede segun $idSedes
					$nombreSede = Sedes::find()->where('id='.$idNiveles[0])->all();
					$nombreSede = ArrayHelper::getColumn($nombreSede, 'descripcion' );
					
					//nombre del nivel segun $idNiveles
					$nombreNivel = Niveles::find()->where('id='.$idSedes[0])->all();
					$nombreNivel = ArrayHelper::getColumn($nombreNivel, 'descripcion' );
										
					$nombreSede = implode(',',$nombreSede);
					$nombreNivel = implode(',',$nombreNivel);
										
					// echo $nombreNivel;
					return $nombreSede.'-'.$nombreNivel;
				},
				
			],
            
			[
				'attribute'=>'id_asignaturas',
				'value' => function( $model )
				{
					$asignaturas = Asignaturas::findOne($model->id_asignaturas);
					return $asignaturas ? $asignaturas->descripcion : '';
				}, //para buscar por el nombre
				'filter' 	=> ArrayHelper::map(Asignaturas::find()->all(), 'id', 'descripcion' ),
				
			],
            'intensidad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
