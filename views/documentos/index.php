<?php

use yii\helpers\Html;
use yii\grid\GridView;

use yii\helpers\Url;
use app\models\Personas;
use app\models\TiposDocumentos;

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
            [ 
				'attribute' => 'ruta' ,
				'format' 	=> 'raw' ,
				'value'		=> function( $model ){
					return Html::a( "Ver archivo", Url::to( "@web/".$model->ruta , true), [ "target"=>"_blank" ] );
				},
			],
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
					
					$tipoDocumento = TiposDocumentos::findOne( $model->tipo_documento );
					return $tipoDocumento ? $tipoDocumento->descripcion : '' ;
				},
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
