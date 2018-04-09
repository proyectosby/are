<?php

use yii\helpers\Html;
use yii\grid\GridView;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecursosInfraestructuraFisicaBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recursos Infraestructura Fisicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recursos-infraestructura-fisica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'cantidad_aulas_regulares',
            'cantidad_aulas_multiples',
            'cantidad_oficinas_admin',
            'cantidad_aulas_profesores',
            //'cantidad_espacios_deportivos',
            //'cantidad_baterias_sanitarias',
            //'cantidad_laboratorios',
            //'cantidad_portatiles',
            //'cantidad_computadores',
            //'cantidad_tabletas',
            //'cantidad_bibliotecas_salas_lectura',
            //'programas_informaticos_admin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
