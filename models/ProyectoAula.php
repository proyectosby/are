<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyecto_aula".
 *
 * @property string $id_grupo
 * @property string $nombre_proyecto
 * @property string $id_jornada
 * @property string $id_persona_coordinador
 * @property string $correo
 * @property string $celular
 * @property string $descripcion
 * @property int $avance_1
 * @property int $avance_2
 * @property int $avance_3
 * @property int $avance_4
 * @property string $Id_sede
 * @property string $id
 *
 * @property Jornadas $jornada
 * @property Paralelos $grupo
 * @property Personas $personaCoordinador
 * @property Sedes $sede
 */
class ProyectoAula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyecto_aula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_grupo', 'nombre_proyecto', 'id_jornada', 'id_persona_coordinador', 'Id_sede'], 'required'],
            [['id_grupo', 'id_jornada', 'id_persona_coordinador', 'avance_1', 'avance_2', 'avance_3', 'avance_4', 'Id_sede'], 'default', 'value' => null],
            [['id_grupo', 'id_jornada', 'id_persona_coordinador', 'avance_1', 'avance_2', 'avance_3', 'avance_4', 'Id_sede'], 'integer'],
            [['nombre_proyecto', 'correo', 'celular', 'descripcion'], 'string'],
            [['id_jornada'], 'exist', 'skipOnError' => true, 'targetClass' => Jornadas::className(), 'targetAttribute' => ['id_jornada' => 'id']],
            [['id_grupo'], 'exist', 'skipOnError' => true, 'targetClass' => Paralelos::className(), 'targetAttribute' => ['id_grupo' => 'id']],
            [['id_persona_coordinador'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['id_persona_coordinador' => 'id']],
            [['Id_sede'], 'exist', 'skipOnError' => true, 'targetClass' => Sedes::className(), 'targetAttribute' => ['Id_sede' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_grupo' => 'Grupo',
            'nombre_proyecto' => 'Nombre Proyecto',
            'id_jornada' => 'Jornada',
            'id_persona_coordinador' => 'Coordinador',
            'correo' => 'Correo',
            'celular' => 'Celular',
            'descripcion' => 'Descripcion',
            'avance_1' => 'Avance 1',
            'avance_2' => 'Avance 2',
            'avance_3' => 'Avance 3',
            'avance_4' => 'Avance 4',
            'Id_sede' => 'Sede',
            'id' => 'ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJornada()
    {
        return $this->hasOne(Jornadas::className(), ['id' => 'id_jornada']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupo()
    {
        return $this->hasOne(Paralelos::className(), ['id' => 'id_grupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaCoordinador()
    {
        return $this->hasOne(Personas::className(), ['id' => 'id_persona_coordinador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSede()
    {
        return $this->hasOne(Sedes::className(), ['id' => 'Id_sede']);
    }
}
