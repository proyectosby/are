<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GestionCurricularBitacorasVisitasIeo */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Bitácora De Visitas A Las Instituciones Educativas Oficiales', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Actualizar";
?>
<div class="gestion-curricular-bitacoras-visitas-ieo-update">

    <h1><?= Html::encode('Bitácora De Visitas A Las Instituciones Educativas Oficiales') ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'jornadas'=>$jornadas,
		'estados'=>$estados,
		'docentes'=>$docentes,
    ]) ?>

</div>
