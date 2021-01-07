<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Reserva;

/**
 * ReservaSearch represents the model behind the search form of `common\models\Reserva`.
 */
class ReservaSearch extends Reserva
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'n_pessoas', 'id_mesa', 'id_funcionario'], 'integer'],
            [['data_hora', 'nome_da_reserva'], 'safe'],
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
        $query = Reserva::find();

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
            'n_pessoas' => $this->n_pessoas,
            'data_hora' => $this->data_hora,
            'id_mesa' => $this->id_mesa,
            'id_funcionario' => $this->id_funcionario,
        ]);

        $query->andFilterWhere(['like', 'nome_da_reserva', $this->nome_da_reserva]);

        return $dataProvider;
    }
}
