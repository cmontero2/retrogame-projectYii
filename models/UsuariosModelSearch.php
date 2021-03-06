<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * UsuariosModelSearch represents the model behind the search form of `app\models\Usuarios`.
 */
class UsuariosModelSearch extends Usuarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rol_id', 'nivel_foro_id', 'telefono'], 'integer'],
            [['user', 'nombre', 'password', 'email', 'nacimiento', 'estado', 'poblacion', 'CIF', 'direccion', 'token'], 'safe'],
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
        $query = Usuarios::find();
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
            'rol_id' => $this->rol_id,
            'nivel_foro_id' => $this->nivel_foro_id,
            'nacimiento' => $this->nacimiento,
            'telefono' => $this->telefono,
        ]);

        $query->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'poblacion', $this->poblacion])
            ->andFilterWhere(['like', 'CIF', $this->CIF])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'token', $this->token]);

        return $dataProvider;
    }
}
