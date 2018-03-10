<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SedesNiveles */

$this->title = 'Create Sedes Niveles';
$this->params['breadcrumbs'][] = ['label' => 'Sedes Niveles', 'url' => ['index', 'idSedes' => $modelSedes->id, 'idInstitucion' => $modelInstitucion->id ]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sedes-niveles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'sedes' => $sedes,
        'niveles' => $niveles,
    ]) ?>

</div>
