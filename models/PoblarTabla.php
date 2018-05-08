<?php
namespace app\models;

use yii\base\Model;

class PoblarTabla extends Model
{
    public $tabla;
    public $archivo;
	
	public function rules()
	{
		return [
			[['tabla','archivo'], 'required'],
		];
	}

    public function attributeLabels()
    {
        return [
            'tabla' => 'Tabla',
            'archivo' => 'Archivo',
        ];
    }
}