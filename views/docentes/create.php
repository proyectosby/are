<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Docentes */

$this->title = 'Agrear Docente:';
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docentes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 				=> $model,
		'modelPerfilesXPersonas'=> $modelPerfilesXPersonas,
		'personas' 	  			=> $personas,
		'escalafones' 			=> $escalafones,
		'estados' 	  			=> $estados,
    ]) ?>

</div>
