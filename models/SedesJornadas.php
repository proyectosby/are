<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sedes_jornadas".
 *
 * @property string $id
 * @property string $id_jornadas
 * @property string $id_sedes
 *
 * @property Paralelos[] $paralelos
 * @property Jornadas $jornadas
 * @property Sedes $sedes
 */
class SedesJornadas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sedes_jornadas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jornadas', 'id_sedes'], 'default', 'value' => null],
            [['id_jornadas', 'id_sedes'], 'integer'],
            [['id_jornadas'], 'exist', 'skipOnError' => true, 'targetClass' => Jornadas::className(), 'targetAttribute' => ['id_jornadas' => 'id']],
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
            'id_jornadas' => 'Id Jornadas',
            'id_sedes' => 'Id Sedes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParalelos()
    {
        return $this->hasMany(Paralelos::className(), ['id_sedes_jornadas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJornadas()
    {
        return $this->hasOne(Jornadas::className(), ['id' => 'id_jornadas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSedes()
    {
        return $this->hasOne(Sedes::className(), ['id' => 'id_sedes']);
    }
}
