<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ParticipacionProyectosMaestro */
/* @var $form yii\widgets\ActiveForm */

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/participacionProyectosMaestro.js',['depends' => [\yii\web\JqueryAsset::className()]]);
?>

<div class="participacion-proyectos-maestro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'programa_proyecto')->dropDownList( $nombresProyectos, [ 'prompt' => 'Seleccione...' ]) ?>

    <?= $form->field($model, 'participante')->dropDownList( $personas, [ 'prompt' => 'Seleccione...', 'onChange' => 'getPefiles()' ] ) ?>

    <?= $form->field($model, 'tipo')->dropDownList( $perfiles ) ?>

    <?= $form->field($model, 'objeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duracion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anio_inicio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anio_fin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tematica')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'areas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otros')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'materiales_recursos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'logros')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_institucion')->dropDownList( $instituciones ) ?>

    <?= $form->field($model, 'estado')->dropDownList( $estados ) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
