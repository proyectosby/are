<?php
/**********
Versión: 001
Fecha: Fecha en formato (12-03-2018)
Desarrollador: Viviana Rodas
Descripción: Lista de Reconocimientos
---------------------------------------
*/

use app\models\Personas;
use app\models\Estados;

use yii\helpers\ArrayHelper;

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReconocimientosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reconocimientos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reconocimientos-index">

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
            'descripcion',
            //para mostrar la descripcion
            // [
				// 'attribute'=>'estado',
				// 'value' => function( $model )
				// {
					// $estados = Estados::findOne($model->estado);
					// return $estados ? $estados->descripcion : '';
				// }, //para buscar por la descripcion
				// 'filter' 	=> ArrayHelper::map(Estados::find()->all(), 'id', 'descripcion' ),
				
			// ],
            // 'id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
