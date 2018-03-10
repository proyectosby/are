<?php

/**********
Versión: 001
Fecha: 09-03-2018
Desarrollador: Edwin Molina Grisales
Descripción: CRUD de instituciones
---------------------------------------
Modificaciones:
Fecha: 09-03-2018
Persona encargada: Edwin Molina Grisales
Cambios Se agrega buscador
---------------------------------------
**********/

use yii\helpers\Html;
use yii\grid\GridView;


use app\models\Estados;
use app\models\Sectores;
use app\models\TiposInstituciones;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Instituciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instituciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns' 	   => [
            ['class' => 'yii\grid\SerialColumn'],
            'descripcion',
            [
				'attribute' => 'id_tipos_instituciones',
				'value' => function( $model ){
					$tiposInstituciones = TiposInstituciones::findOne($model->id_tipos_instituciones);
					return $tiposInstituciones ? $tiposInstituciones->descripcion : '';
				},
				'filter' => ArrayHelper::map(TiposInstituciones::find()->all(), 'id', 'descripcion' ),
			],
            [
				'attribute' => 'id_sectores',
				'value' => function( $model ){
					$sectores = Sectores::findOne($model->id_sectores);
					return $sectores ? $sectores->descripcion : '';
				},
				'filter' => ArrayHelper::map(Sectores::find()->all(), 'id', 'descripcion' ),
			],
            'nit',
            //'estado',
            //'caracter',
            //'especialidad',
            //'rector',
            //'contacto_rector',
            //'correo_electronico_institucional',
            //'pagina_web',
            //'codigo_dane',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
