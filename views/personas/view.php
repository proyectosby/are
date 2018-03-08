<?php
/**********
Versión: 001
Fecha: (06-03-2018)
Desarrollador: Viviana Rodas
Descripción: Vista de personas
---------------------------------------
*/

use yii\helpers\Html;
use yii\widgets\DetailView;

use app\models\Generos;
/* @var $this yii\web\View */
/* @var $model app\models\Personas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro que desea eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'usuario',
            'psw',
            'identificacion',
            'nombres',
            'apellidos',
            'telefonos',
            'fecha_nacimiento',
            'fecha_registro',
            'correo',
            'domicilio',
            'fecha_ultimo_ingreso',
            'envio_correo:boolean',
            'id_municipios',
            'id_tipos_identificaciones',
            'latitud',
            'longitud',
            'id_estados_civiles',
			//este es el llamado al modelo generos para poder listar la descricion del genero
            [
				'attribute'=>'id_generos',
				'value' => function( $model )
				{
					$descripcionGeneros = Generos::findOne($model->id_generos);
					return $descripcionGeneros ? $descripcionGeneros->descripcion : '';
				},
				
			],
            'hobbies',
            'id_barrios_veredas',
            'estado',
        ],
    ]) ?>

</div>
