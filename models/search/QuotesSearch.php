<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Quotes;

/**
 * QuotesSearch represents the model behind the search form about `app\models\Quotes`.
 */
class QuotesSearch extends Quotes
{
    public $userSearch;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'construction', 'protection', 'country', 'zone', 'prior_since', 'occupied', 'occupied_type', 'policy_type', 'deductible_bldg', 'deductible_bp', 'building_rc_acv', 'business_property_rc_acv', 'mercantile_occupany_in_bldg', 'status', 'does_lead_exclusion_apply', 'operated_by_insured', 'apt_in_bldg', 'sole_occupancy', 'consumed_on_premises', 'prop_damage', 'agregate', 'med_payment','user_id'], 'integer'],
            [['name', 'address', 'date_create', 'date_quoted', 'zip_code', 'agent', 'building_amount_of_ins', 'bus_amount_of_ins', 'each_occurrence', 'each_person_accident', 'userSearch','user_id'], 'safe'],
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
        $query = Quotes::find();

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
            'user_id' => $this->user_id,
            'date_create' => $this->date_create,
            'date_quoted' => $this->date_quoted,
            'construction' => $this->construction,
            'protection' => $this->protection,
            'country' => $this->country,
            'zone' => $this->zone,
            'prior_since' => $this->prior_since,
            'occupied' => $this->occupied,
            'occupied_type' => $this->occupied_type,
            'policy_type' => $this->policy_type,
            'deductible_bldg' => $this->deductible_bldg,
            'deductible_bp' => $this->deductible_bp,
            'building_rc_acv' => $this->building_rc_acv,
            'business_property_rc_acv' => $this->business_property_rc_acv,
            'mercantile_occupany_in_bldg' => $this->mercantile_occupany_in_bldg,
            'status' => $this->status,
            'does_lead_exclusion_apply' => $this->does_lead_exclusion_apply,
            'operated_by_insured' => $this->operated_by_insured,
            'apt_in_bldg' => $this->apt_in_bldg,
            'sole_occupancy' => $this->sole_occupancy,
            'consumed_on_premises' => $this->consumed_on_premises,
            'prop_damage' => $this->prop_damage,
            'agregate' => $this->agregate,
            'med_payment' => $this->med_payment,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'agent', $this->agent])
            ->andFilterWhere(['like', 'building_amount_of_ins', $this->building_amount_of_ins])
            ->andFilterWhere(['like', 'bus_amount_of_ins', $this->bus_amount_of_ins])
            ->andFilterWhere(['like', 'each_occurrence', $this->each_occurrence])
            ->andFilterWhere(['like', 'each_person_accident', $this->each_person_accident]);

        return $dataProvider;
    }

    public function search_by_user($params,$id)
    {
        $query = Quotes::find();

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
            'user_id' => $id,
            'date_create' => $this->date_create,
            'date_quoted' => $this->date_quoted,
            'construction' => $this->construction,
            'protection' => $this->protection,
            'country' => $this->country,
            'zone' => $this->zone,
            'prior_since' => $this->prior_since,
            'occupied' => $this->occupied,
            'occupied_type' => $this->occupied_type,
            'policy_type' => $this->policy_type,
            'deductible_bldg' => $this->deductible_bldg,
            'deductible_bp' => $this->deductible_bp,
            'building_rc_acv' => $this->building_rc_acv,
            'business_property_rc_acv' => $this->business_property_rc_acv,
            'mercantile_occupany_in_bldg' => $this->mercantile_occupany_in_bldg,
            'status' => $this->status,
            'does_lead_exclusion_apply' => $this->does_lead_exclusion_apply,
            'operated_by_insured' => $this->operated_by_insured,
            'apt_in_bldg' => $this->apt_in_bldg,
            'sole_occupancy' => $this->sole_occupancy,
            'consumed_on_premises' => $this->consumed_on_premises,
            'prop_damage' => $this->prop_damage,
            'agregate' => $this->agregate,
            'med_payment' => $this->med_payment,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'zip_code', $this->zip_code])
            ->andFilterWhere(['like', 'agent', $this->agent])
            ->andFilterWhere(['like', 'building_amount_of_ins', $this->building_amount_of_ins])
            ->andFilterWhere(['like', 'bus_amount_of_ins', $this->bus_amount_of_ins])
            ->andFilterWhere(['like', 'each_occurrence', $this->each_occurrence])
            ->andFilterWhere(['like', 'each_person_accident', $this->each_person_accident]);

        return $dataProvider;
    }
}
