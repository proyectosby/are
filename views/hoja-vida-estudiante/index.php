<?php

use yii\helpers\Html;
use yii\grid\GridView;

use app\models\TiposIdentificaciones;
use app\models\Personas;
use app\models\Instituciones;
use app\models\Generos;
use app\models\Jornadas;
use app\models\Sedes;



/* @var $this yii\web\View */
/* @var $searchModel app\models\HojaVidaEstudianteBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hoja Vida Estudiantes';
$this->params['breadcrumbs'][] = $this->title;

// var_dump( $searchModel );

$models = $dataProvider->getModels();

?>
<style>
.span{
	padding: 10px;
	display: inline-block;
}
</style>
<div class="hoja-vida-estudiante-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    
	<?php

	foreach( $models as $key => $model ){

		$tipoDocumento 	= TiposIdentificaciones::findOne( $model->id_tipos_identificaciones);
		$institucion 	= Instituciones::findOne( $model->institucion );
		$genero 		= Generos::findOne( $model->id_generos );
		$personaLegal	= Personas::findOne( $model->id );
		$tipoDocumentoPL= TiposIdentificaciones::findOne( $personaLegal->id_tipos_identificaciones);
		$sede			= Sedes::findOne( $model->sede );
		$jornada		= Jornadas::findOne( $model->jornada );
		$grupo			= $model->grupo;
		list( $grado )	= explode( "-", $model->grupo );
		
		$cumpleanos = new DateTime($model->fecha_nacimiento);
		$hoy 		= new DateTime();
		$annos 		= $hoy->diff($cumpleanos);
		$edad 		= $annos->y;

		echo "<div>";
		echo "<span class=span>".$tipoDocumento->descripcion." ".$model->identificacion."</span>";
		echo "<span class=span>".$model->nombres." ".$model->apellidos."</span>";
		echo "<span class=span>"."FECHA DE NACIMIENTO: ".$model->fecha_nacimiento."</span>";
		echo "<span class=span>"."EDAD: ".$edad."</span>";
		echo "<span class=span>".$genero->descripcion."</span>";
		echo "<br>";
		echo "<span class=span>".$institucion->descripcion. "</span><span clss=span> SEDE: ".$sede->descripcion." </span><span clss=span>GRADO: ".$grado."</span><span clss=span> GRUPO: </span><span clss=span>".$grupo." JORNADA: </span><span clss=span>".$jornada->descripcion."</span>" ;
		echo "<br>";

		echo "<span class=span>".$tipoDocumentoPL->descripcion." ".$personaLegal->identificacion."</span>";
		echo "<span class=span>".$personaLegal->nombres." ".$personaLegal->apellidos."</span>";
		echo "<span>PARENTESCO: MAMÁ</span>";
		echo "<span class=span>"."CORREO: ".$personaLegal->correo."</span>";
		echo "<span class=span>"."TELEFONO: ".$personaLegal->telefonos."</span>";
		echo "<br>";
		echo "<span class=span>"."UTILIZA TRANSPORTE MIO"."</span>";
		echo "<br>";
		echo "<span class=span>"."No. TARJETA: </span><span clss=span>MIO: </span><span clss=span>DISCAPACIDAD: NINGUNA"."</span>";
		echo "<br>";
		echo"<span class=span>". "RECIBE ALIMENTACION COMPLEMENTARIA"."</span>";
		echo "</div>";

		break;
	}
	?>
</div>
