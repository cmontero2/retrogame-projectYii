<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Entradas;

/**
 * EntradasModelSearch represents the model behind the search form of `app\models\Entradas`.
 */
class EntradasModelSearch extends Entradas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'usuario_id', 'seccion_id'], 'integer'],
            [['titulo', 'texto', 'fecha', 'estado'], 'safe'],
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
    public function search($params, $aceptadas = false, $aprobar=0)
    {
        $query = Entradas::find();

        if (!$aceptadas) {
            $query->where("estado='A'");
        }
        if($aprobar == 1){
            $query->where("estado='P'");
        }

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
            'fecha' => $this->fecha,
            'usuario_id' => $this->usuario_id,
            'seccion_id' => $this->seccion_id,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'texto', $this->texto])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
