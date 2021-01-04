<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Horario;

/**
 * HorarioSearch represents the model behind the search form of `common\models\Horario`.
 */
class HorarioSearch extends Horario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ano', 'id_funcionario'], 'integer'],
            [['mes', 'dia_semana', 'hora_inicio', 'hora_fim'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Horario::find();

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
            'ano' => $this->ano,
            'id_funcionario' => $this->id_funcionario,
        ]);

        $query->andFilterWhere(['like', 'mes', $this->mes])
            ->andFilterWhere(['like', 'dia_semana', $this->dia_semana])
            ->andFilterWhere(['like', 'hora_inicio', $this->hora_inicio])
            ->andFilterWhere(['like', 'hora_fim', $this->hora_fim]);

        return $dataProvider;
    }
}
