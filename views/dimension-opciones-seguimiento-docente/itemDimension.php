<?php
use yii\helpers\Html;

use yii\bootstrap\ActiveForm;

use app\models\DimensionOpcionesSeguimientoDocente;

$data = DimensionOpcionesSeguimientoDocente::find()
			->where( 'id_tipo_dimension='.$dimension )
			->andWhere( 'estado=1' )
			->all();
			
$form = ActiveForm::begin([
		// 'layout' => 'horizontal',
		// 'fieldConfig' => [
			// 'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
			// 'horizontalCssClasses' => [
				// 'label' 	=> 'col-sm-2',
				// 'offset' 	=> 'col-sm-offset-2',
				// 'wrapper' 	=> 'col-sm-8',
				// 'error' 	=> '',
				// 'hint' 		=> '',
				// 'input' 	=> 'col-sm-2',
			// ],
		// ],
	]);
			
foreach( $data as $key => $value ){
	// echo "<div class='row'>";
	echo $form->field( $value , 'descripcion' )->radioList( $parametros )->label(  $value->descripcion );
	// echo "</div>";
}