<?php
/**********
Versión: 001
Fecha: Fecha en formato (12-03-2018)
Desarrollador: Viviana Rodas
Descripción: Lista de Escolaridades
---------------------------------------
*/

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Personas;
use app\models\Escolaridades;

use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonasEscolaridadesBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas Escolaridades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-escolaridades-index">

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
				'attribute'=>'id_escolaridades',
				'value' => function( $model )
				{
					$escolaridades = Escolaridades::findOne($model->id_escolaridades);
					return $escolaridades ? $escolaridades->descripcion : '';
				}, //para buscar por la descripcion
				'filter' 	=> ArrayHelper::map(Escolaridades::find()->all(), 'id', 'descripcion' ),
				
			],
            'ultimo_nivel_cursado',
            'ano_curso',
            'titulacion:boolean',
            //'titulo',
            //'institucion',
            //'id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
