<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GestionCurricularDocenteTutorAcompanamiento */

$this->title = 'Agregar Gestion Curricular Docente Tutor Acompanamiento';
$this->params['breadcrumbs'][] = ['label' => 'Gestion Curricular Docente Tutor Acompanamientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Agregar";
?>
<div class="gestion-curricular-docente-tutor-acompanamiento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 	=> $model,
		'docentes'	=>$docentes,
		'sedes'		=> $sedes,
		'instituciones'=> $instituciones,
		'parametro1'=> $parametro1,
		'titulos1'	=> $titulos1,
		'titulos2'	=> $titulos2,
		'titulos3'	=> $titulos3,
    ]) ?>

</div>
