<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sedes_niveles".
 *
 * @property string $id
 * @property string $id_niveles
 * @property string $id_sedes
 *
 * @property AsignaturasXNivelesSedes[] $asignaturasXNivelesSedes
 * @property Paralelos[] $paralelos
 * @property Niveles $niveles
 * @property Sedes $sedes
 */
class SedesNiveles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sedes_niveles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_niveles', 'id_sedes'], 'default', 'value' => null],
            [['id_niveles', 'id_sedes'], 'integer'],
            [['id_niveles'], 'exist', 'skipOnError' => true, 'targetClass' => Niveles::className(), 'targetAttribute' => ['id_niveles' => 'id']],
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
            'id_niveles' => 'Id Niveles',
            'id_sedes' => 'Id Sedes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturasXNivelesSedes()
    {
        return $this->hasMany(AsignaturasXNivelesSedes::className(), ['id_sedes_niveles' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParalelos()
    {
        return $this->hasMany(Paralelos::className(), ['id_sedes_niveles' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNiveles()
    {
        return $this->hasOne(Niveles::className(), ['id' => 'id_niveles']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSedes()
    {
        return $this->hasOne(Sedes::className(), ['id' => 'id_sedes']);
    }
}
