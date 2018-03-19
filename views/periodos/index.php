<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Sedes;
use	yii\helpers\ArrayHelper; 

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeridosBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */



$nombreSede = new Sedes();
$nombreSede = $nombreSede->find()->where('id='.$idSedes)->all();
$nombreSede = ArrayHelper::map($nombreSede,'id','descripcion');
$nombreSede = $nombreSede[$idSedes];

$this->title = 'Peridos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periodos-index">

    <h1><?= Html::encode($nombreSede) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <?= Html::a('Agregar', [
									'create',
									'idSedes' 		=> $idSedes,
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
            'descripcion',
            'fecha_inicio',
            'fecha_fin',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
