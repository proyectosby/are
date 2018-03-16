<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PlanDeAula;

/**
 * PlanDeAulaBuscar represents the model behind the search form of `app\models\PlanDeAula`.
 */
class PlanDeAulaBuscar extends PlanDeAula
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_periodo', 'id_nivel', 'id_asignatura', 'estado', 'id_perfiles_x_personas_docentes'], 'integer'],
            [['fecha', 'actividad', 'observaciones'], 'safe'],
            [['evaluativa'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PlanDeAula::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_periodo' => $this->id_periodo,
            'id_nivel' => $this->id_nivel,
            'id_asignatura' => $this->id_asignatura,
            'fecha' => $this->fecha,
            'evaluativa' => $this->evaluativa,
            'estado' => $this->estado,
            'id_perfiles_x_personas_docentes' => $this->id_perfiles_x_personas_docentes,
        ]);

        $query->andFilterWhere(['ilike', 'actividad', $this->actividad])
            ->andFilterWhere(['ilike', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
