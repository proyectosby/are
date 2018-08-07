<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GestionCurricularBitacorasVisitasIeo */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Gestión Curricular Bitácoras Visitas ieo', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Actualizar";
?>
<div class="gestion-curricular-bitacoras-visitas-ieo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'jornadas'=>$jornadas,
		'estados'=>$estados,
		'docentes'=>$docentes,
    ]) ?>

</div>
