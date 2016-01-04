<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Occupancy;

/**
 * OcuupancySearch represents the model behind the search form about `app\models\Occupancy`.
 */
class OccupancySearch extends Occupancy
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'mer_serc', 'rate_group', 'crime_group', 'bldg_rg'], 'integer'],
            [['name'], 'safe'],
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
        $query = Occupancy::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'mer_serc' => $this->mer_serc,
            'rate_group' => $this->rate_group,
            'crime_group' => $this->crime_group,
            'bldg_rg' => $this->bldg_rg,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
