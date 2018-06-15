<?php
if(@$_SESSION['sesion']=="si")
{ 
	// echo $_SESSION['nombre'];
} 
//si no tiene sesion se redirecciona al login
else
{
	echo "<script> window.location=\"index.php?r=site%2Flogin\";</script>";
	die;
}

use yii\helpers\Html;
use yii\grid\GridView;
use fedemotta\datatables\DataTables;
use app\models\Instituciones;

$nombreInstitucion = Instituciones::find()->where("id=".$idInstitucion)->one();
$nombreInstitucion = $nombreInstitucion->descripcion;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docente por Institucion';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docente-institucion-index">

    <h1><?= Html::encode($nombreInstitucion) ?></h1>


   <?= DataTables::widget([
        'dataProvider' => $dataProvider,
		'clientOptions' => [
		'language'=>[
                'url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json',
            ],
		"lengthMenu"=> [[20,-1], [20,Yii::t('app',"All")]],
		"info"=>false,
		"responsive"=>true,
		 "dom"=> 'lfTrtip',
		 "tableTools"=>[
			 "aButtons"=> [  
				// [
				// "sExtends"=> "copy",
				// "sButtonText"=> Yii::t('app',"Copiar")
				// ],
				// [
				// "sExtends"=> "csv",
				// "sButtonText"=> Yii::t('app',"CSV")
				// ],
				[
				"sExtends"=> "xls",
				"oSelectorOpts"=> ["page"=> 'current']
				],
				[
				"sExtends"=> "pdf",
				"oSelectorOpts"=> ["page"=> 'current']
				],
				// [
				// "sExtends"=> "print",
				// "sButtonText"=> Yii::t('app',"Imprimir")
				// ],
			],
		 ],
	],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'identificacion',
            'nombres',
            'apellidos',
            'asignatura',
            

            // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
