<?php
/**********
Versión: 001
Fecha: 17-03-2018
Desarrollador: Oscar David Lopez
Descripción: CRUD de ponderacion-resultados
---------------------------------------
Modificaciones:
Fecha: 17-03-2018
Persona encargada: Oscar David Lopez
Cambios realizados: - nombre de los botones 
Envío de variables para mostrar los posibles valores de los periodos
Envío de variables para mostrar los posibles valores de los estados
---------------------------------------
**********/
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PonderacionResultados */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Ponderacion Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="ponderacion-resultados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'periodos'=>$periodos,
		'estados'=>$estados,
    ]) ?>

</div>
