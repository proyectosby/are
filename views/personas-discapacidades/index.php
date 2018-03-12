<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Personas;
use app\models\TiposDiscapacidades;

use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonasDiscapacidadesBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas Discapacidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-discapacidades-index">

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

            //para mostrar el nombre en en la lista
            [
				'attribute'=>'id_personas',
				'value' => function( $model )
				{
					$personas = Personas::findOne($model->id_personas);
					return $personas ? $personas->nombres : '';
				}, //para buscar por el nombre
				'filter' 	=> ArrayHelper::map(Personas::find()->all(), 'id', 'nombres' ),
				
			],
            //para mostrar la descripcion
            [
				'attribute'=>'id_tipos_discapacidades',
				'value' => function( $model )
				{
					$discapacidades = TiposDiscapacidades::findOne($model->id_tipos_discapacidades);
					return $discapacidades ? $discapacidades->descripcion : '';
				}, //para buscar por la descripcion
				'filter' 	=> ArrayHelper::map(TiposDiscapacidades::find()->all(), 'id', 'descripcion' ),
				
			],
            'descripcion:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
