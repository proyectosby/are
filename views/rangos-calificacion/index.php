<?php

/**********
Versión: 001
Fecha: 13-03-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de RangosCalificacion
---------------------------------------
Modificaciones:
Fecha: 13-03-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - No se muestra el id, no el estado
---------------------------------------
**********/

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Instituciones;
use app\models\TiposCalificacion;
use yii\helpers\ArrayHelper;

$institucionNombre = new Instituciones();
$institucionNombre = $institucionNombre->find()->where('id='.$idInstitucion)->all();
$institucionNombre = ArrayHelper::map($institucionNombre,'id','descripcion');
$institucionNombre = $institucionNombre[$idInstitucion];

/* @var $this yii\web\View */
/* @var $searchModel app\models\RangosCalificacionBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $institucionNombre;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rangos-calificacion-index">

    <h1><?= Html::encode('Rangos Calificaciones') ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?= Html::a('Agregar', [
									'create',
									'idInstitucion' => $idInstitucion, 
								], 
								['class' => 'btn btn-success'
		]) ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'valor_minimo',
            'valor_maximo',
            'descripcion',
            [
				'attribute'=>'id_tipo_calificacion',
				'value'=> function ($model)
				{
					$TipoCalificacion = TiposCalificacion::findOne($model->id_tipo_calificacion);
					return $TipoCalificacion ? $TipoCalificacion->descripcion : '';
				},
			],
            //'id_instituciones',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
