<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "plan_de_aula".
 *
 * @property string $id
 * @property string $id_periodo
 * @property string $id_nivel
 * @property string $id_asignatura
 * @property string $fecha
 * @property string $actividad
 * @property string $observaciones
 * @property bool $evaluativa
 * @property string $estado
 * @property string $id_perfiles_x_personas_docentes
 *
 * @property Asignaturas $asignatura
 * @property Docentes $perfilesXPersonasDocentes
 * @property Estados $estado0
 * @property Niveles $nivel
 * @property Periodos $periodo
 */
class PlanDeAula extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan_de_aula';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_periodo', 'id_nivel', 'estado', 'id_perfiles_x_personas_docentes'], 'required'],
            [['id_periodo', 'id_nivel', 'id_asignatura', 'estado', 'id_perfiles_x_personas_docentes'], 'default', 'value' => null],
            [['id_periodo', 'id_nivel', 'id_asignatura', 'estado', 'id_perfiles_x_personas_docentes'], 'integer'],
            [['fecha'], 'safe'],
            [['evaluativa'], 'boolean'],
            [['actividad'], 'string', 'max' => 1000],
            [['observaciones'], 'string', 'max' => 200],
            [['id_asignatura'], 'exist', 'skipOnError' => true, 'targetClass' => Asignaturas::className(), 'targetAttribute' => ['id_asignatura' => 'id']],
            [['id_perfiles_x_personas_docentes'], 'exist', 'skipOnError' => true, 'targetClass' => Docentes::className(), 'targetAttribute' => ['id_perfiles_x_personas_docentes' => 'id_perfiles_x_personas']],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estado' => 'id']],
            [['id_nivel'], 'exist', 'skipOnError' => true, 'targetClass' => Niveles::className(), 'targetAttribute' => ['id_nivel' => 'id']],
            [['id_periodo'], 'exist', 'skipOnError' => true, 'targetClass' => Periodos::className(), 'targetAttribute' => ['id_periodo' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_periodo' => 'Periodo',
            'id_nivel' => 'Nivel',
            'id_asignatura' => 'Asignatura',
            'fecha' => 'Fecha',
            'actividad' => 'Actividad',
            'observaciones' => 'Observaciones',
            'evaluativa' => 'Evaluativa',
            'estado' => 'Estado',
            'id_perfiles_x_personas_docentes' => 'Perfiles por personal Docente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignatura()
    {
        return $this->hasOne(Asignaturas::className(), ['id' => 'id_asignatura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilesXPersonasDocentes()
    {
        return $this->hasOne(Docentes::className(), ['id_perfiles_x_personas' => 'id_perfiles_x_personas_docentes']);
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
    public function getNivel()
    {
        return $this->hasOne(Niveles::className(), ['id' => 'id_nivel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodo()
    {
        return $this->hasOne(Periodos::className(), ['id' => 'id_periodo']);
    }
}
