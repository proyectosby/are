<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyectos_pedagogicos_transversales".
 *
 * @property string $id
 * @property int $codigo_grupo
 * @property string $nombre_grupo
 * @property string $coordinador
 * @property string $area
 * @property string $correo
 * @property string $celular
 * @property string $linea_investigacion_1
 * @property string $linea_investigacion_2
 * @property string $linea_investigacion_3
 * @property string $estado
 *
 * @property Estados $estado0
 */
class ProyectosPedagogicosTransversales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyectos_pedagogicos_transversales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo_grupo', 'nombre_grupo', 'coordinador', 'area'], 'required'],
            [['codigo_grupo', 'coordinador', 'area', 'estado'], 'default', 'value' => null],
            [['codigo_grupo', 'coordinador', 'area', 'estado'], 'integer'],
            [['nombre_grupo', 'correo', 'celular', 'linea_investigacion_1', 'linea_investigacion_2', 'linea_investigacion_3'], 'string'],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo_grupo' => 'Codigo Grupo',
            'nombre_grupo' => 'Nombre Grupo',
            'coordinador' => 'Coordinador',
            'area' => 'Area',
            'correo' => 'Correo',
            'celular' => 'Celular',
            'linea_investigacion_1' => 'Linea Investigacion 1',
            'linea_investigacion_2' => 'Linea Investigacion 2',
            'linea_investigacion_3' => 'Linea Investigacion 3',
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
}
