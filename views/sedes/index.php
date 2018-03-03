<?php
/**********
Versión: 001
Fecha: 02-03-2018
Desarrollador: Edwin Molina Grisales
Descripción: CRUD de sedes
---------------------------------------
Modificaciones:
Fecha: 02-03-2018
Persona encargada: Edwin Molina Grisales
Cambios realizados: Se envía la vista _form los municipios y el id de la institución seleccionada desde la lista de sedes 
					y a la url del breadcrumbs también
---------------------------------------
**********/

use yii\helpers\Html;
use yii\helpers\URL;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\Instituciones;

$descripcionIntitucion = "";
if( !empty( $idInstitucion ) )
{
	$insti = Instituciones::findOne($idInstitucion);
	$descripcionIntitucion = $insti->descripcion."\n";
}

$this->title = 'Sedes';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="sedes-index">
    
	<h1><?= Html::encode($descripcionIntitucion) ?></h1>

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar', ['create', 'idInstitucion'=>$idInstitucion ], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descripcion',
            'telefonos',
            'direccion',
            // 'area',
            //'id_instituciones',
            //'latitud',
            //'longitud',
            //'id_zonificaciones',
            //'id_tenencias',
            //'id_modalidades',
            //'id_municipios',
            //'id_generos_sedes',
            //'id_calendarios',
            //'id_estratos',
            //'id_barrios_veredas',
            'codigo_dane',
            //'sede_principal',
            //'comuna',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
