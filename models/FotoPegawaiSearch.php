<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FotoPegawai;

/**
 * FotoPegawaiSearch represents the model behind the search form of `app\models\FotoPegawai`.
 */
class FotoPegawaiSearch extends FotoPegawai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pegawai_id'], 'integer'],
            [['foto_blob', 'foto_blob_other','foto', 'foto_other'], 'safe'],
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
        $query = FotoPegawai::find();

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
            'pegawai_id' => $this->pegawai_id,
        ]);

        $query->andFilterWhere(['ilike', 'foto_blob', $this->foto_blob])
            ->andFilterWhere(['ilike', 'foto_blob_other', $this->foto_blob_other])
            ->andFilterWhere(['ilike', 'foto', $this->foto])
            ->andFilterWhere(['ilike', 'foto_other', $this->foto_other]);

        return $dataProvider;
    }
}
