<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Personas;
use app\models\RepresentantesLegales;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PerfilesXPersonasBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfiles-xpersonas-index">

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

            // 'id',
			[
				'attribute' => 'id_personas',
				'label' 	=> 'Estudiante',
				'value'		=> function( $model){
									$personas = Personas::findOne( $model->id_personas );
									return $personas ? $personas->nombres." ".$personas->apellidos : '';
								},
				'filter'	=> ArrayHelper::map( Personas::find()->select( "id, ( nombres || ' ' || apellidos ) nombres " )->all(), 'id', 'nombres' ),
			],
			[
				'attribute' => 'id_perfiles',
				'label' 	=> 'Representante legal',
				'value'		=> function( $model ){
									
									$personas = Personas::find()
													->select( "( nombres || ' ' || apellidos ) nombres" )
													->innerJoin( 'representantes_legales rl', 'rl.id_personas=personas.id' )
													->where( 'rl.id_perfiles_x_personas='.$model->id )
													->one();
									return $personas ? $personas->nombres : '';
								},
				'filter'	=> ArrayHelper::map( Personas::find()->select( "id, ( nombres || ' ' || apellidos ) nombres " )->all(), 'id', 'nombres' ),
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
