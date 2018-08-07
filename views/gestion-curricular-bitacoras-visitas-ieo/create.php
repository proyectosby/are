<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GestionCurricularBitacorasVisitasIeo */

$this->title = 'Agregar Gestion Curricular Bitacoras Visitas ieo';
$this->params['breadcrumbs'][] = ['label' => 'Gestión Curricular Bitácoras Visitas ieo', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="gestion-curricular-bitacoras-visitas-ieo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 	=> $model,
        'model2' 	=> $model2,
		'model3' 	=> $model3,
		'model4' 	=> $model4,
		'model5' 	=> $model5,
		'model6' 	=> $model6,
		'model7' 	=> $model7,
		'model8' 	=> $model8,
		'model9' 	=> $model9,
		'titulos'	=> $titulos,
		'parametro'	=> $parametro,
		'jornadas'	=> $jornadas,
		'estados'	=> $estados,
		'docentes'	=> $docentes,
		'momento1Sem1'	=> $momento1Sem1,
    ]) ?>

</div>
