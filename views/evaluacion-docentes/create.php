<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EvaluacionDocentes */

$this->title = 'Agregar evalución del docente';
$this->params['breadcrumbs'][] = ['label' => 'Evaluacion Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evaluacion-docentes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' 		=> $model,
		'personas' 		=> $personas,
        'estados' 		=> $estados,
    ]) ?>

</div>
