<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

use app\models\Personas;

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/calificaciones.js',['depends' => [\yii\web\JqueryAsset::className()]]);

$personas = Personas::find()
						->select( "pp.id as id, ( nombres || ' ' || apellidos ) nombres" )
						->innerJoin( 'perfiles_x_personas pp', 'pp.id_personas=personas.id' )
						->where(   'pp.id_perfiles=11' )
						->all();


 
// echo "<pre>"; var_dump( $personas ); echo "</pre>";

/* @var $this yii\web\View */
/* @var $searchModel app\models\CalificacionesBuscar */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Calificaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    
    table {
		width:90%;
		border-top:1px solid #e5eff8;
		border-right:1px solid #e5eff8;
		margin:1em auto;
		border-collapse:collapse;
    }
    td {
		color:#678197;
		border-bottom:1px solid #e5eff8;
		border-left:1px solid #e5eff8;
		padding:.3em 1em;
		text-align:center;
    }
	
	thead > tr > th {
		text-align: center;
		background-color: #ccc;
		border: 1px solid #ddd;
	}

</style>

<div class="calificaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	
	<?php $form = ActiveForm::begin(); ?>
	
	
	<div style='text-align:center;background-color:#ddd;'>
	
		<table style='width:80%;'>
			<tr>
				<td>
					 <?= $form->field( $searchModel, 'observaciones' )->dropDownList( [], [ 'prompt' => 'Seleccione...' ] )->label( 'Codigo DANE' ) ?>
				</td>
				
				<td>
					 <?= $form->field( $searchModel, 'observaciones' )->dropDownList( [], [ 'prompt' => 'Seleccione...' ] )->label( 'Institución educativa' ) ?>
				</td>
				
				<td>
					 <?php echo $form->field( $searchModel, 'observaciones' )->textInput( [ 'id'=>'txtSede','readOnly'=>'true' ] )->label( 'Sede' ) ?>
				</td>
			</tr>
		</table>
		
	</div>
	
	<br>
	<br>
	
	<h2><?= Html::encode( "Registro de calificaciones" ) ?></h2>
	
	
	
	<div style='text-align:center;background-color:#ddd;'>
	
		<table style='width:80%;'>
		
			<tr>
				<td>
					 <?php echo  $form->field( $searchModel, 'observaciones' )->dropDownList( [], [ 'prompt' => 'Seleccione...' ,'id'=>'selDocentes'] )->label( 'Docente' ) ?>
				</td>
				
				<td>
					 <?php echo $form->field( $searchModel, 'observaciones' )->dropDownList( [], [ 'prompt' => 'Seleccione...','id'=>'selGrado'] )->label( 'Grado' ) ?>
				</td>
				
				<td>
					 <?php echo $form->field( $searchModel, 'observaciones' )->dropDownList( [], [ 'prompt' => 'Seleccione...','id'=>'selGrupo' ] )->label( 'Grupo' ) ?>
				</td>
			</tr>
			
			<tr>
				<td>
					 <?php echo $form->field( $searchModel, 'observaciones' )->dropDownList( [], [ 'prompt' => 'Seleccione...' ,'id'=>'selMateria'] )->label( 'Materia' ) ?>
				</td>
				
				<td>
					 <?php echo $form->field( $searchModel, 'observaciones' )->dropDownList( [], [ 'prompt' => 'Seleccione...','id'=>'selJornada' ] )->label( 'Jornada' ) ?>
				</td>
				
				<td>
					 <?php echo $form->field( $searchModel, 'observaciones' )->dropDownList( [], [ 'prompt' => 'Seleccione...' ,'id'=>'selPeriodo'] )->label( 'Periodo' ) ?>
				</td>
			</tr>
			
		</table>
		
	</div>
	<br>
	<br>
	<br>
	<div>
		<table>
			<thead >
				<tr>
					<th rowspan = '2' colspan=2></th>
					<th colspan = '3'>COGNITIVO</th>
					<th>Personal</th>
					<th>Social</th>
					<th>AE</th>
					<th>Nota final</th>
					<th>Faltas</th>
					<th>Co evaluaci&oacute;n</th>
				</tr>
				
				<tr>
					<th>Saber conocer</th>
					<th>Saber hacer</th>
					<th>Saber ser</th>
					<th colspan=6></th>
				</tr>
				
				<tr>
					<th rowspan=2>No</th>
					<th rowspan=2>Estudiantes</th>
					<th colspan=5>Desempeños</th>
					<th colspan=4></th>
				</tr>
				<tr>
					<th>3</th>
					<th>4</th>
					<th>5</th>
					<th>18</th>
					<th>20</th>
					<th>19</th>
					<th colspan=4></th>
				</tr>
			</thead>
			
			<tbody>

				<?php $i = 1; foreach($personas as $key=>$persona): ?>
					
					<tr>
						<td><b>#<?= ($i++) ?></b></td>
						<td>
							<b><?= Html::encode( $persona->nombres." ".$persona->apellidos ) ?></b>
							<input type='hidden' value='<?= $persona->id ?>' name='idPersona'>
						</td>
						<td><?= $form->field( $searchModel, 'observaciones' )->textInput()->label( '' ) ?></td>
						<td><?= $form->field( $searchModel, 'observaciones' )->textInput()->label( '' ) ?></td>
						<td><?= $form->field( $searchModel, 'observaciones' )->textInput()->label( '' ) ?></td>
						<td><?= $form->field( $searchModel, 'observaciones' )->textInput()->label( '' ) ?></td>
						<td><?= $form->field( $searchModel, 'observaciones' )->textInput()->label( '' ) ?></td>
						<td><?= $form->field( $searchModel, 'observaciones' )->textInput()->label( '' ) ?></td>
						<td><?= $form->field( $searchModel, 'observaciones' )->textInput([ 'disabled' => 'disabled' ])->label( '' ) ?></td>
						<td><?= $form->field( $searchModel, 'observaciones' )->textInput()->label( '' ) ?></td>
						<td><?= $form->field( $searchModel, 'observaciones' )->textInput()->label( '' ) ?></td>
					</tr>
				
				<?php endforeach; ?>
				
			</tbody>
		</table>
	</div>
	<br>
	<br>
	 <p>
        <?= Html::a('Guardar', [''], ['class' => 'btn btn-success']) ?>
    </p>
	
	<?php ActiveForm::end(); ?>
	
	
	
	
	
	
	
    <p>
        <!-- <?= Html::a('Create Calificaciones', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <!-- <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'calificacion',
            'fecha',
            'observaciones',
            'id_perfiles_x_personas_docentes',
            //'id_perfiles_x_personas_estudiantes',
            //'id_asignaciones_x_indicador_desempeno',
            //'fecha_modificacion',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?> -->
</div>
