<?php
/**********
Versión: 001
Fecha: Fecha en formato (10-03-2018)
Desarrollador: Viviana Rodas
Descripción: Lista de formaciones
---------------------------------------
*/

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Personas;
use app\models\TiposFormaciones;

use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonasFormacionesBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas Formaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-formaciones-index">

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
				'attribute'=>'id_tipos_formaciones',
				'value' => function( $model )
				{
					$formaciones = TiposFormaciones::findOne($model->id_tipos_formaciones);
					return $formaciones ? $formaciones->descripcion : '';
				}, //para buscar por la descripcion
				'filter' 	=> ArrayHelper::map(TiposFormaciones::find()->all(), 'id', 'descripcion' ),
				
			],
            'horas_curso',
            'ano_curso',
            'titulacion:boolean',
            //'titulo',
            //'institucion',
            //'id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); 
	?>
</div>
