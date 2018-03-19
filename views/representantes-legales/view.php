<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Personas;
use app\models\RepresentantesLegales;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\PerfilesXPersonas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perfiles-xpersonas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
           [
				'attribute' => 'id_personas',
				'label' 	=> 'Estudiante',
				'value'		=> function( $model){
									$personas = Personas::findOne( $model->id_personas );
									return $personas ? $personas->nombres." ".$personas->apellidos : '';
								},
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
			],
        ],
    ]) ?>

</div>
