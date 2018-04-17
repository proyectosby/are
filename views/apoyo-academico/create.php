<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ApoyoAcademico */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Apoyo Academico', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apoyo-academico-create">

    <h1><?= Html::encode('Agregar Apoyo Academico') ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'estudiantes'=>$estudiantes,
		'doctores'=>$doctores,
    ]) ?>

</div>
