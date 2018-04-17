<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Personas;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocumentosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documentos-index">

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
            'ruta',
			[
				'attribute' => 'id_persona',
				'value' => function( $model ){
					$persona = Personas::findOne( $model->id_persona );
					return $persona ? $persona->nombres." ".$persona->apellidos: '' ;
				},
			],
            [
				'attribute' => 'tipo_documento',
				'value' 	=> function( $model ){
					
					$tipo = "";
					
					switch( $model->tipo_documento ){
						case 0: $tipo = 'Diplomado en licenciatura escolar'; break;
						case 1: $tipo = 'Certificado congreso de maestros'; break;
						case 2: $tipo = 'Maestría en ciencias básicas'; break;
					}
					
					return $tipo;
				},
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
