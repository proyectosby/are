<?php

use yii\helpers\Html;
use yii\grid\GridView;
use fedemotta\datatables\DataTables;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DistribucionesAcademicasBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Distribuciones Academicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribuciones-academicas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Distribuciones Academicas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_asignaturas_x_niveles_sedes',
            'id_perfiles_x_personas_docentes',
            'id_aulas_x_sedes',
            'fecha_ingreso',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
