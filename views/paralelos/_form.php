<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\Jornadas;
use app\models\Niveles;

/* @var $this yii\web\View */
/* @var $model app\models\Paralelos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paralelos-form">
<?php

$jornadasTable	 = new Jornadas();
$dataJornadas	 = $jornadasTable->find()->orderby('descripcion')->all();
$jornadas		 = ArrayHelper::map( $dataJornadas, 'id', 'descripcion' );


$nivelesTable	 = new Niveles();
$dataNiveles	 = $nivelesTable->find()->orderby('descripcion')->all();
$niveles		 = ArrayHelper::map( $dataNiveles, 'id', 'descripcion' );



?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_sedes_jornadas')->dropDownList($jornadas, [ 'prompt' => 'Seleccione...', 'id'=>'id_instituciones' ]) ?>

    <?= $form->field($model, 'id_sedes_niveles')->dropDownList($niveles, [ 'prompt' => 'Seleccione...', 'id'=>'id_instituciones' ]) ?>

    <?= $form->field($model, 'ano_lectivo')->textInput() ?>

    <?= $form->field($model, 'fecha_ingreso')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
