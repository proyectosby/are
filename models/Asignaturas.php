<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asignaturas".
 *
 * @property string $id
 * @property string $descripcion
 * @property string $id_sedes
 * @property string $estado
 *
 * @property Estados $estado0
 * @property Sedes $sedes
 * @property AsignaturasXNivelesSedes[] $asignaturasXNivelesSedes
 */
class Asignaturas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asignaturas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sedes', 'estado'], 'default', 'value' => null],
            [['id_sedes', 'estado'], 'integer'],
            [['descripcion'], 'string', 'max' => 100],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
            [['id_sedes'], 'exist', 'skipOnError' => true, 'targetClass' => Sedes::className(), 'targetAttribute' => ['id_sedes' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'id_sedes' => 'Id Sedes',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado0()
    {
        return $this->hasOne(Estados::className(), ['id' => 'estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSedes()
    {
        return $this->hasOne(Sedes::className(), ['id' => 'id_sedes']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturasXNivelesSedes()
    {
        return $this->hasMany(AsignaturasXNivelesSedes::className(), ['id_asignaturas' => 'id']);
    }
}
