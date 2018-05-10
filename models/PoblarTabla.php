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
			[['archivo'], 'file','maxSize' => 1024*1024*50 ],
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