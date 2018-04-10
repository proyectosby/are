<?php

/**********
Versión: 001
Fecha: 09-04-2018
Persona encargada: Edwin Molina Grisales
CRUD de RECURSOS DE INFRAESTRUCTURA PEDAGOGICA
---------------------------------------
**********/

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\Sedes;
use app\models\Instituciones;
use yii\helpers\ArrayHelper;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecursoInfraestructuraPedagogicaBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recurso Infraestructura Pedagogicas';
$this->params['breadcrumbs'][] = $this->title;

$sedes 	 	 = Sedes::findOne( $idSedes );
$institucion = Instituciones::findOne($sedes->id_instituciones);
?>
<div class="recurso-infraestructura-pedagogica-index">

	<h1><?= Html::encode($institucion->descripcion) ?></h1>
    <h3><?= Html::encode($sedes->descripcion) ?></h1>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar', ['create', 'idSedes' => $idSedes ], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cantidad_computdores_portatiles',
            'cantidad_aulas_tita',
            'cantidad_bibliotecas',
            'cantidad_ludotecas',
            //'cantidad_salones_juegos',
            //'id_sede',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
