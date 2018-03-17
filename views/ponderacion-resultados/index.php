<?php
/**********
Versión: 001
Fecha: 17-03-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de Aponderacion-resultados
---------------------------------------
Modificaciones:
Fecha: 17-03-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - se elimina el campo id para mostrar
---------------------------------------
**********/
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Periodos;
use	yii\helpers\ArrayHelper;
use app\models\PonderacionResultados;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PonderacionResultadosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ponderación Resultados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ponderacion-resultados-index">

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
				'attribute'=>'id_periodo',
				'value' => function( $model )
				{
					$Periodos = Periodos::findOne($model->id_periodo);
					return $Periodos ? $Periodos->descripcion : '';
				}, //para buscar por el nombre
				'filter' 	=> ArrayHelper::map(Periodos::find()->all(), 'id', 'descripcion' ),
				
			],
			[
				'attribute'=>'calificacion',
				//para buscar por el nombre
				'filter' 	=> ArrayHelper::map(PonderacionResultados::find()->all(), 'calificacion', 'calificacion' ),
				
			],			

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
