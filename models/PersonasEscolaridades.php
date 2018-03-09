<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personas_x_escolaridades".
 *
 * @property string $id_personas
 * @property string $id_escolaridades
 * @property int $ultimo_nivel_cursado
 * @property int $ano_curso
 * @property bool $titulacion
 * @property string $titulo
 * @property string $institucion
 * @property string $id
 *
 * @property Escolaridades $escolaridades
 * @property Personas $personas
 */
class PersonasEscolaridades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personas_x_escolaridades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_personas', 'id_escolaridades', 'ultimo_nivel_cursado', 'ano_curso'], 'default', 'value' => null],
            [['id_personas', 'id_escolaridades', 'ultimo_nivel_cursado', 'ano_curso'], 'integer'],
            [['titulacion'], 'boolean'],
            [['titulo', 'institucion'], 'string', 'max' => 80],
            [['id_escolaridades'], 'exist', 'skipOnError' => true, 'targetClass' => Escolaridades::className(), 'targetAttribute' => ['id_escolaridades' => 'id']],
            [['id_personas'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['id_personas' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_personas' => 'Id Personas',
            'id_escolaridades' => 'Id Escolaridades',
            'ultimo_nivel_cursado' => 'Ultimo Nivel Cursado',
            'ano_curso' => 'Ano Curso',
            'titulacion' => 'Titulacion',
            'titulo' => 'Titulo',
            'institucion' => 'Institucion',
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscolaridades()
    {
        return $this->hasOne(Escolaridades::className(), ['id' => 'id_escolaridades']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasOne(Personas::className(), ['id' => 'id_personas']);
    }
}
