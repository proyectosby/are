<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ParticipantesGruposSoporte */

$this->title = 'Actualizar Participantes Grupos Soporte';
$this->params['breadcrumbs'][] = 
	[
		'label' => 'Participantes Grupos Soporte', 
		'url' => [
					'index',
					'TiposGruposSoporte'=>$TiposGruposSoporte,
					'idGruposSoporte'=>$idGruposSoporte,
					'idJornadas'=>$idJornadas,
				 ]
	];	
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="participantes-grupos-soporte-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'estados'=>$estados,
		'estudiantes'=>$estudiantes,
		'TiposGruposSoporte'=>$TiposGruposSoporte,
		'idGruposSoporte'=>$idGruposSoporte,
		'idJornadas'=>$idJornadas,
    ]) ?>

</div>
