<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Falta;

/**
 * FaltaSearch represents the model behind the search form of `common\models\Falta`.
 */
class FaltaSearch extends Falta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'num_horas', 'id_funcionario'], 'integer'],
            [['data', 'hora_inicio', 'hora_fim'], 'safe'],
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
        $query = Falta::find();

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
            'data' => $this->data,
            'hora_inicio' => $this->hora_inicio,
            'hora_fim' => $this->hora_fim,
            'num_horas' => $this->num_horas,
            'id_funcionario' => $this->id_funcionario,
        ]);

        return $dataProvider;
    }
}
