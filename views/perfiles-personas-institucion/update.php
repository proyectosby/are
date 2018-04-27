<?php

use yii\helpers\Html;

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/perfilPersonaInstitucion.js',['depends' => [\yii\web\JqueryAsset::className()]]);


/* @var $this yii\web\View */
/* @var $model app\models\PerfilesPersonasInstitucion */

$this->title = 'Modificar Perfiles Personas Institucion';
$this->params['breadcrumbs'][] = ['label' => 'Perfiles Personas Institucions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="perfiles-personas-institucion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'perfilesTable' => $perfilesTable,
		'perfiles' => $perfiles,
		'instituciones' => $instituciones,
		'estados' => $estados,
		'perfilesSelected' => $perfilesSelected,
		'PerfilesXPersonas' => $PerfilesXPersonas,
		'modificar' => $modificar,
			
    ]) ?>

</div>
