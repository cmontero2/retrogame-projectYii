<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuariosJuego;

/**
 * UsuariosJuegoModelSearch represents the model behind the search form of `app\models\UsuariosJuego`.
 */
class UsuariosJuegoModelSearch extends UsuariosJuego
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'juego_id', 'usuario_id'], 'integer'],
            [['fecha_id'], 'safe'],
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
        $query = UsuariosJuego::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>['pageSize'=>5] //paginacion
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
            'juego_id' => $this->juego_id,
            'usuario_id' => $this->usuario_id,
            'fecha_id' => $this->fecha_id,
        ]);

        return $dataProvider;
    }
}
