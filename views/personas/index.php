<?php

/**********
Versión: 001
Fecha: (06-03-2018)
Desarrollador: Viviana Rodas
Descripción: Vista de personas
---------------------------------------
*/

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Generos;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'usuario',
            // 'psw',
            'identificacion',
            'nombres',
            'apellidos',
            //'telefonos',
            //'fecha_nacimiento',
            //'fecha_registro',
            'correo',
            //'domicilio',
            //'fecha_ultimo_ingreso',
            //'envio_correo:boolean',
            //'id_municipios',
            //'id_tipos_identificaciones',
            //'latitud',
            //'longitud',
            //'id_estados_civiles',
			//este es el llamado al modelo generos para poder listar la descricion del genero
            [
				'attribute'=>'id_generos',
				'value' => function( $model )
				{
					$descripcionGeneros = Generos::findOne($model->id_generos);
					return $descripcionGeneros ? $descripcionGeneros->descripcion : '';
				},
				
			], 
            //'hobbies',
            //'id_barrios_veredas',
            //'estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
