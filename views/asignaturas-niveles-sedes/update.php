<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AsignaturasNivelesSedes */

$this->title = 'Actualizar Asignaturas Niveles Sedes:';
$this->params['breadcrumbs'][] = ['label' => 'Asignaturas Niveles Sedes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';



?>

<script>

var idModelo= <?php echo $model->id; ?>;

</script>
<div class="asignaturas-niveles-sedes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'idSedes' =>$idSedes,
		'idNiveles'=>$idNiveles,
		'idAsignaturas'=>$idAsignaturas,
    ]) ?>

</div>
