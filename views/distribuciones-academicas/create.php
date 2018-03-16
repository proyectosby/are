<?php

use yii\helpers\Html;
// $this->registerJsFile('@web/js/distribucionesAcademicas.js');
 $this->registerJsFile(Yii::$app->request->baseUrl.'/js/distribucionesAcademicas.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<script>

// window.onload = llenarCombo();

// function llenarCombo()
// {		alert("uuuuu");
	// $.get('index.php?r=distribuciones-academicas/listar',
				// {
					 // searchname: "holaa" ,
				// },
				// function(data){
					// console.log("dddda");
					// // if(data.error == 1)
					// // {
												
					// // }
					// // else
					// // {
						
						
					// // }
				
				// },
				// "json"
				
		  // );
	
// }

</script>

<?php
/* @var $this yii\web\View */
/* @var $model app\models\DistribucionesAcademicas */
$this->title = 'Create Distribuciones Academicas';
$this->params['breadcrumbs'][] = ['label' => 'Distribuciones Academicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribuciones-academicas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
