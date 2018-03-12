<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SedesBloquesBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sedes Bloques';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sedes-bloques-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sedes Bloques', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sedes',
            'id_bloques',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
