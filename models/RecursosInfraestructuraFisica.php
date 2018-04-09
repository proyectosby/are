<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recursos_infraestructura_fisica".
 *
 * @property string $id
 * @property int $cantidad_aulas_regulares
 * @property int $cantidad_aulas_multiples
 * @property int $cantidad_oficinas_admin
 * @property int $cantidad_aulas_profesores
 * @property int $cantidad_espacios_deportivos
 * @property int $cantidad_baterias_sanitarias
 * @property int $cantidad_laboratorios
 * @property int $cantidad_portatiles
 * @property int $cantidad_computadores
 * @property int $cantidad_tabletas
 * @property int $cantidad_bibliotecas_salas_lectura
 * @property string $programas_informaticos_admin
 */
class RecursosInfraestructuraFisica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recursos_infraestructura_fisica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cantidad_aulas_regulares', 'cantidad_aulas_multiples', 'cantidad_oficinas_admin', 'cantidad_aulas_profesores', 'cantidad_espacios_deportivos', 'cantidad_baterias_sanitarias', 'cantidad_laboratorios', 'cantidad_portatiles', 'cantidad_computadores', 'cantidad_tabletas', 'cantidad_bibliotecas_salas_lectura'], 'default', 'value' => null],
            [['cantidad_aulas_regulares', 'cantidad_aulas_multiples', 'cantidad_oficinas_admin', 'cantidad_aulas_profesores', 'cantidad_espacios_deportivos', 'cantidad_baterias_sanitarias', 'cantidad_laboratorios', 'cantidad_portatiles', 'cantidad_computadores', 'cantidad_tabletas', 'cantidad_bibliotecas_salas_lectura'], 'integer'],
            [['programas_informaticos_admin'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cantidad_aulas_regulares' => 'Cantidad Aulas Regulares',
            'cantidad_aulas_multiples' => 'Cantidad Aulas Multiples',
            'cantidad_oficinas_admin' => 'Cantidad Oficinas Admin',
            'cantidad_aulas_profesores' => 'Cantidad Aulas Profesores',
            'cantidad_espacios_deportivos' => 'Cantidad Espacios Deportivos',
            'cantidad_baterias_sanitarias' => 'Cantidad Baterias Sanitarias',
            'cantidad_laboratorios' => 'Cantidad Laboratorios',
            'cantidad_portatiles' => 'Cantidad Portatiles',
            'cantidad_computadores' => 'Cantidad Computadores',
            'cantidad_tabletas' => 'Cantidad Tabletas',
            'cantidad_bibliotecas_salas_lectura' => 'Cantidad Bibliotecas Salas Lectura',
            'programas_informaticos_admin' => 'Programas Informaticos Admin',
        ];
    }
}
