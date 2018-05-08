<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile("https://unpkg.com/sweetalert/dist/sweetalert.min.js");


if( !empty( $msg ) ){
	
	// var_dump( $msg['errorInfo'][1] );
	
	$warning = $msg[0] == 0 ? 'success' : 'warning';
	$message = str_replace( "\n", "<br>", $msg[1] );
	
	$this->registerJs( <<< EOT_JS_CODE

  swal({
		text: "$message",
		icon: "$warning",
		button: "Cerrar",
	});

EOT_JS_CODE
);
}

$this->title = 'Poblar tabla';
?>

<style>
	.table{
		display: table;
	}

	.row{
		display: table-row;
	}

	.cell{
		display: table-cell;
	}
</style>

<h1><?= Html::encode($this->title) ?></h1>

<div class="documentos-form">

    <?php $form = ActiveForm::begin([
		// 'id' => 'contact-form',
		// 'enableAjaxValidation' => true,
		'method' 				=> 'post',
		'enableClientValidation'=> true,		
		'options' 				=> [ 'enctype' => 'multipart/form-data' ],
		'action' 				=> [ 'create' ],
	]); ?>
    
	
	<div id=dvTable class=table>
		
		<div class=row>
	
			<div class=cell>
				<?= $form->field( $model, 'tabla')->dropDownList( $tablas, [ 'prompt' => 'Seleccione...', 'class' => 'form-control' ] ) ?>
			</div>
		
		</div>
		
		<div class=row>

			<div class=cell>
				<?= $form->field( $model, 'archivo')->fileInput( [ 'accept' => ".csv, .txt" ] )->label( 'Archivo csv' ) ?>
			</div>
				
		</div>
	
		<div class=row>
			<div class=cell>
				<br><b>Ejemplo archivo csv:</b>
				<p style='background:#ddd;padding:10px;'>
					"campo1","campo2","campo3",...<br>
					"campo1","campo2","campo3",...
				</p>
			</div>
		</div>
		
	</div>
    
	
	<div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
