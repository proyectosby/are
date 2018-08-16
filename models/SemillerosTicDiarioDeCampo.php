<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semilleros_tic.diario_de_campo".
 *
 * @property string $id
 * @property string $id_ejecucion_fase
 * @property string $descripcion
 * @property string $hallazgos
 * @property string $estado
 */
class SemillerosTicDiarioDeCampo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'semilleros_tic.diario_de_campo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ejecucion_fase', 'descripcion', 'hallazgos', 'estado'], 'required'],
            [['id_ejecucion_fase', 'estado'], 'default', 'value' => null],
            [['id_ejecucion_fase', 'estado'], 'integer'],
            [['descripcion', 'hallazgos'], 'string', 'max' => 5000],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
            [['id_ejecucion_fase'], 'exist', 'skipOnError' => true, 'targetClass' => SemillerosTicEjecucionFase::className(), 'targetAttribute' => ['id_ejecucion_fase' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ejecucion_fase' => 'Ejecución Fase',
            'descripcion' => 'Descripción',
            'hallazgos' => 'Hallazgos',
            'estado' => 'Estado',
        ];
    }
}
