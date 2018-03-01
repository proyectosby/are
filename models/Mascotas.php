<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mascotas".
 *
 * @property string $id
 * @property string $animal
 * @property string $nombre
 * @property string $raza
 * @property string $edad
 * @property string $genero
 */
class Mascotas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mascotas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['edad'], 'safe'],
            [['genero'], 'string'],
            [['animal', 'nombre', 'raza'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'animal' => 'Animal',
            'nombre' => 'Nombre',
            'raza' => 'Raza',
            'edad' => 'Edad',
            'genero' => 'Genero',
        ];
    }
}
