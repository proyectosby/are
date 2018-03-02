<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sedes */

$this->title = 'Actualizar Sede:';
$this->params['breadcrumbs'][] = ['label' => 'Sedes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sedes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 		 => $model,
        'barriosVeredas' => $barriosVeredas,
        'calendarios' 	 => $calendarios,
        'estratos'	 	 => $estratos,
        'generosSedes'	 => $generosSedes,
        'instituciones'	 => $instituciones,
        'modalidades'	 => $modalidades,
        'tenencias'	 	 => $tenencias,
        'zonificaciones' => $zonificaciones,
        'estados' 		 => $estados,
        'municipios'	 => $municipios,
    ]) ?>

</div>
