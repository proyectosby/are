<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
        <?= Html::a('Create Personas Escolaridades', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_personas',
            'id_escolaridades',
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
