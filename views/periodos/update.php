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
use app\models\Sedes;
use	yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Periodos */

$nombreSede = new Sedes();
$nombreSede = $nombreSede->find()->where('id='.$idSedes)->all();
$nombreSede = ArrayHelper::map($nombreSede,'id','descripcion');
$nombreSede = $nombreSede[$idSedes];

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Periodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = [
									'label' => 'Asignaturas', 
									'url' => [
												'index',
												'idInstitucion' => $idInstitucion, 
												'idSedes' 		=> $model->id_sedes,
											 ]
								 ];

$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="periodos-update">

    <h1><?= Html::encode($nombreSede) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'estados'=>$estados,
		'idSedes'=>$idSedes,
    ]) ?>

</div>
