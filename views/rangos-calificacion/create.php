<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RangosCalificacion */


$this->title = 'Agregar';
$this->params['breadcrumbs'][] = [
									'label' => 'Rangos Calificaciones', 
									'url' => [
												'index',
												'idInstitucion' => $idInstitucion, 
											 ]
								 ];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rangos-calificacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'idInstitucion'=>$idInstitucion,
		'institucionNombre'=>$institucionNombre,
		'estados'=>$estados,
		'TiposCalificacion'=>$TiposCalificacion,
		
    ]) ?>

</div>
