<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personas".
 *
 * @property string $id
 * @property string $tipoDocumento
 * @property string $nombre
 * @property string $Dir
 */
class Personas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'default', 'value' => null],
            [['id'], 'integer'],
            [['tipoDocumento', 'nombre', 'Dir'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipoDocumento' => 'Tipo Documento',
            'nombre' => 'Nombre',
            'Dir' => 'Dir',
        ];
    }
}
