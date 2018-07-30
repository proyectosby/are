<?php

use yii\helpers\Html;
// use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

// use yii\bootstrap\Collapse;
use nex\chosen\Chosen;

use app\models\PoblacionEstudiantesSesion;
use app\models\Sesiones;

$form = ActiveForm::begin([
		'layout' => 'horizontal',
		'fieldConfig' => [
			'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
			'horizontalCssClasses' => [
				'label' 	=> 'col-sm-2',
				'offset' 	=> 'col-sm-offset-2',
				'wrapper' 	=> 'col-sm-8',
				'error' 	=> '',
				'hint' 		=> '',
				'input' 	=> 'col-sm-2',
			],
		],
	]);

foreach( $sesiones as $keySesion =>$sesion ){
		
	if( !$idPE ){
		$poblacion = new PoblacionEstudiantesSesion();
		$idPE = 0;
	}
	else{
		$poblacion = PoblacionEstudiantesSesion::findOne([ 
						'id_poblacion_estudiantes' 	=> $idPE,
						'id_sesiones'				=> $sesion->id,
					]);
	}
	// var_dump( $poblacion );
	echo Html::activeHiddenInput( $poblacion, "[$index]id_sesiones", [ 'value' => $sesion->id ] );
	// echo Html::activeHiddenInput( $poblacion, "[$index]id" );
	echo $form->field( $poblacion, "[$index]valor" )->label( $sesion->descripcion );
	
	$index++;
}
?>

<div class="form-group">
	<?= Html::label( "Total", '', [ 'class'=>'control-label col-sm-2' ] ) ?>
	<div>
		<span></span>
		<div class="col-sm-8">
			<span total class='form-control'></span>
		</div>
	</div>
</div>

