<?php
use yii\helpers\Html;
use yii\grid\GridView;

use yii\data\ArrayDataProvider;
use fedemotta\datatables\DataTables;

use app\models\Periodos;
use app\models\FestivosNolaborales;
use app\models\Personas;
use app\models\Aulas;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InasistenciasBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$columns = [];
array_push( $columns, ['class' => 'yii\grid\SerialColumn'] );
array_push( $columns, 'nombres' );
array_push( $columns, 'identificacion' );

$this->title = 'Inasistencias';
$this->params['breadcrumbs'][] = $this->title;

$periodo 	= Periodos::findOne( $idPeriodo );
$festivos 	= FestivosNolaborales::find()
						->where( [ 'between' , 'fecha', "'".$periodo->fecha_inicio."'", "'".$periodo->fecha_fin."'" ] )
						->andWhere( "id_sedes=".$idSedes )
						->all();

//Convierto todos los festivos en unix
$festivosUnix = [];
foreach( $festivos as $k => $value ){
	$festivosUnix[] = strtotime( $value->fecha." 00:00:00 UTC" );
}

//Creando un array de todos los días validos en el tiempo del periodo
//Primero calculo fecha inicial y final del periodo en tiempo unix
$inicioPeriodo = strtotime( $periodo->fecha_inicio." 00:00:00 UTC" );
$finalPeriodo  = strtotime( $periodo->fecha_fin." 00:00:00 UTC" );

//dias habiles contiene todos los días habiles en que se dan clases en tiempo unix
$diasHabiles = [];
for( $i = $inicioPeriodo; $i <= $finalPeriodo; $i += 24*3600 ){
	
	/*****************************************************
	 * date( w ) es el numero de la semana 0-6
	 * 0 para domingo, 6 para sábado
	 * Si es sábado o domingo no se agrega la fecha
	 *****************************************************/
	$diaSemana = date( "w", $i );
	if( $diaSemana != 0 && $diaSemana != 6 ){
		
		//Si no está en festivos se agrega la fecha
		if( !in_array( $i, $festivosUnix ) ){
			$diasHabiles[ gmdate( "Y-m-d", $i ) ] = "asistio";
			array_push( $columns, ['attribute' => gmdate( "Y-m-d", $i ) ] );
		}
	}
}


// foreach( $diasHabiles as $k => $v )
	// echo "<br>".gmdate( "Y-m-d", $v );
$aulas = Aulas::findOne( $idGrupo );
$estudiantes = Personas::find()
					->select( "personas.id, ( nombres || apellidos ) as nombres, personas.identificacion" )
					->innerJoin( "perfiles_x_personas pp", "pp.id_personas=personas.id" )
					->innerJoin( "estudiantes e", "e.id_perfiles_x_personas=pp.id" )
					->innerJoin( "paralelos p", "p.id=e.id_paralelos" )
					->where( "p.estado=1" )
					->andWhere( "pp.estado=1" )
					->andWhere( "personas.estado=1" )
					->andWhere( "e.estado=1" )
					->andWhere( "p.descripcion='".$aulas->descripcion."'" )
					->all();
		
$data = [];		
foreach( $estudiantes as $key => $value ){
	// echo "<br>".$value->nombres." ".$value->identificacion;
	
	 $a = [
		'nombres' 		 => $value->nombres,
		'identificacion' => $value->identificacion,
	];
	
	$data[] = $a + $diasHabiles;
}

$dataProvider = new ArrayDataProvider([
    'allModels' => $data,
    'pagination' => [
        'pageSize' => 10,
    ],
    'sort' => [
        'attributes' => ['id', 'name'],
    ],
]);







// array_push( $columns, ['class' => 'yii\grid\ActionColumn'] );

?>
 




<div class="inasistencias-index" style='overflow:auto;'>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inasistencias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DataTables::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $columns,
    ]); ?>
</div>
