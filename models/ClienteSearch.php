<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cliente;

class ClienteSearch extends Cliente
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombre', 'apellido','email'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Cliente::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
			->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
