<?php

namespace app\models\_base;

use Yii;
use app\models\Occupancy;


/**
 * This is the model class for table "bop_rater_entry".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $address
 * @property string $date_create
 * @property string $date_quoted
 * @property string $zip_code
 * @property string $agent
 * @property integer $construction
 * @property integer $protection
 * @property integer $country
 * @property integer $zone
 * @property integer $prior_since
 * @property integer $occupied
 * @property integer $occupied_type
 * @property integer $policy_type
 * @property integer $deductible_bldg
 * @property integer $deductible_bp
 * @property integer $building_rc_acv
 * @property integer $business_property_rc_acv
 * @property integer $mercantile_occupany_in_bldg
 * @property integer $status
 * @property integer $does_lead_exclusion_apply
 * @property integer $operated_by_insured
 * @property integer $apt_in_bldg
 * @property integer $sole_occupancy
 * @property integer $consumed_on_premises
 * @property string $building_amount_of_ins
 * @property string $bus_amount_of_ins
 * @property integer $prop_damage
 * @property integer $agregate
 * @property integer $med_payment
 * @property string $each_occurrence
 * @property string $each_person_accident
 */
class BaseQuotes extends \yii\db\ActiveRecord
{
    const FINISHED = 1;
    const UNFINISHED = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bop_rater_entry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['construction', 'protection', 'country', 'zone', 'prior_since', 'occupied','prop_damage', 'agregate'],'required','message'=>'{attribute} must be chosen.'],
            [['does_lead_exclusion_apply','apt_in_bldg', 'sole_occupancy', 'consumed_on_premises'],'required','message'=>'{attribute} must be answered.'],
            [['mercantile_occupany_in_bldg', 'med_payment', 'occupied_type','policy_type'],'required','message'=>'{attribute} must be indicated.'],
            [['user_id'], 'required'],
            [['date_create', 'date_quoted'], 'safe'],
            [[ 'building_amount_of_ins', 'bus_amount_of_ins','user_id','construction', 'protection', 'country', 'zone', 'prior_since', 'occupied', 'occupied_type', 'policy_type', 'deductible_bldg', 'deductible_bp', 'building_rc_acv', 'business_property_rc_acv', 'mercantile_occupany_in_bldg', 'status', 'does_lead_exclusion_apply', 'operated_by_insured', 'apt_in_bldg', 'sole_occupancy', 'consumed_on_premises', 'prop_damage', 'agregate', 'med_payment'], 'integer'],
            [['name', 'address', 'zip_code', 'agent', 'each_occurrence', 'each_person_accident'], 'string', 'max' => 255],
            [['country'],'validateCountry'],
            [['zone'],'validateZone'],
            [['policy_type'],'validatePolicyType'],
            [['building_rc_acv'],'validateBuilding'],
            [['business_property_rc_acv'],'validateBP'],
            [['prop_damage'],'validatePropDamage'],
            [['med_payment'],'validateMedPayment'],
            [['operated_by_insured'],'validateOperatedInsured'],
            [['building_amount_of_ins', 'bus_amount_of_ins'],'validateAmount'],
            [['building_amount_of_ins'],'validateAmountBuilding'],
            [['bus_amount_of_ins'],'validateAmountBP'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Quote #'),
            'user_id' => Yii::t('app', 'User'),
            'name' => Yii::t('app', 'Named Insured'),
            'address' => Yii::t('app', 'Address'),
            'date_create' => Yii::t('app', 'Date'),
            'date_quoted' => Yii::t('app', 'Date Quoted'),
            'zip_code' => Yii::t('app', 'Zip Code'),
            'agent' => Yii::t('app', 'Agent'),
            'construction' => Yii::t('app', 'Construction'),
            'protection' => Yii::t('app', 'Protection'),
            'country' => Yii::t('app', 'Country'),
            'zone' => Yii::t('app', 'Zone'),
            'prior_since' => Yii::t('app', 'Prior/Since'),
            'occupied' => Yii::t('app', 'Occupancy'),
            'occupied_type' => Yii::t('app', 'Owner or Lessor Occupancy'),
            'policy_type' => Yii::t('app', 'Policy Type'),
            'deductible_bldg' => Yii::t('app', 'Deductible-Bldg'),
            'deductible_bp' => Yii::t('app', 'Deductible-BP'),
            'building_rc_acv' => Yii::t('app', 'Building (RC/ACV)'),
            'business_property_rc_acv' => Yii::t('app', 'Business Property (RC/ACV)'),
            'mercantile_occupany_in_bldg' => Yii::t('app', 'Mercantile Occupancy In Bldg'),
            'status' => Yii::t('app', 'Status'),
            'does_lead_exclusion_apply' => Yii::t('app', 'Does Lead Exclusion Apply'),
            'operated_by_insured' => Yii::t('app', 'Operated By Insured'),
            'apt_in_bldg' => Yii::t('app', 'Is there an Apt. in the Bldg.?'),
            'sole_occupancy' => Yii::t('app', 'Sole Occupancy'),
            'consumed_on_premises' => Yii::t('app', 'Are Food/Beverages consumed on premises?'),
            'building_amount_of_ins' => Yii::t('app', 'Building - Amount of Ins'),
            'bus_amount_of_ins' => Yii::t('app', 'Bus. Prop. - Amount of Ins.'),
            'prop_damage' => Yii::t('app', 'Body Inj. & Prop. Damage'),
            'agregate' => Yii::t('app', 'Aggregate'),
            'med_payment' => Yii::t('app', 'Med Payment'),
            'each_occurrence' => Yii::t('app', 'Each Occurrence'),
            'each_person_accident' => Yii::t('app', 'Each Person/Accident'),
        ];
    }
    /**
     * @return string
     * get urls for generated files
     */
    public function getPdfUrl(){
        return '/storage/'.date('Y-m',strtotime($this->date_create)).'/'.md5($this->id).'.pdf';
    }

    public function getCsvUrl(){
        return '/storage/'.date('Y-m',strtotime($this->date_create)).'/'.md5($this->id).'.xls';
    }

    /**
     *
     * validate country and protection
     */
    public function validateCountry($attr,$params){
        if($this->$attr&&$this->protection){
            if(in_array($this->$attr,[3,24,31,41,43])&&$this->protection!=1){
               $this->addError('protection','New York City countries must be Highly Protected.');
               $this->addError($attr,'New York City countries must be Highly Protected.');
            }
        }
    }

    /**
     * @param $attr
     * @param $params
     * validate country and zone
     */
    public function validateZone($attr,$params){
        if($this->$attr&&$this->country){
            if($this->$attr==3&&!in_array($this->country,[3,24,31,41,43])){
                $this->addError($attr,'New York City countries are in New York City zone.');
                $this->addError('country','New York City zone is not available for this country');
            }
            elseif(in_array($this->$attr,[1,2])&&in_array($this->country,[3,24,31,41,43])){
                $this->addError($attr,'New York City countries are not valid for "Upstate & Suburban" and "Upstate Cities" zones.');
                $this->addError('country','New York City countries are not valid for "Upstate & Suburban" and "Upstate Cities" zones.');
            }
            elseif($this->$attr==2&&!in_array($this->country,[1,4,15,60,32,28,47,34,42,33])){
                $this->addError($attr,'When zone is "Upstate Cities", a country with eligible city must be chosen.See "Help" for eligible cities.');
                $this->addError('country','When zone is "Upstate Cities", a country with eligible city must be chosen.See "Help" for eligible cities.');
            }
        }
        if($this->$attr&&$this->protection) {
            if ($this->zone == 3 && $this->protection!=1){
                $this->addError($attr,'New York City zone must be Highly Protected');
                $this->addError('protection','New York City zone must be Highly Protected');
            }
        }
    }
    /**
     * @param $attr
     * @param $params
     * validate policy type
     */
    public function validatePolicyType($attr,$params){
        if($this->$attr&&$this->prop_damage){
            if($this->$attr==2&&$this->prop_damage==1){
                $this->addError($attr,'$100,000 Limit of Liability is not available on a Deluxe Policy.');
                $this->addError('prop_damage','$100,000 Limit of Liability is not available on a Deluxe Policy.');
            }
        }
        if($this->$attr&&$this->med_payment){
            if($this->$attr==2&&$this->med_payment<=3){
                $this->addError($attr,'$500 per person Medical Payments is not available on a Deluxe Police.');
                $this->addError('med_payment','$500 per person Medical Payments is not available on a Deluxe Police.');
            }
        }
    }
    /**
     * @param $attr
     * @param $params
     */
    public function validateBuilding($attr,$params){
        if($this->building_amount_of_ins>0&&$this->$attr==3){
            $this->addError($attr,'Replacement Cost or Actual Cash Value must be chosen if a Building Limit is indicated.');
        }
    }
    /**
     * @param $attr
     * @param $params
     */
    public function validateBP($attr,$params){
        if($this->bus_amount_of_ins>0&&$this->$attr==3){
            $this->addError($attr,'Replacement Cost or Actual Cash Value must be chosen if a Business Property Limit is indicated.');
        }
    }
    /**
     * @param $attr
     * @param $params
     */
    public function validatePropDamage($attr,$params){
        if($this->$attr&&$this->agregate){
            if($this->$attr>1&&$this->$attr<6&&$this->$attr>$this->agregate){
                $this->addError($attr,'The BI & PD Limit must be less than Aggregate.');
                $this->addError('agregate','The BI & PD Limit must be less than Aggregate.');
            }
            if($this->$attr==6&&$this->agregate!=7){
                $this->addError($attr,'The BI & PD Limit must be entered to have an Aggregate.');
            }
        }

    }
    /**
     * @param $attr
     * @param $params
     * check med payments if prop_damage is selected
     */
    public function validateMedPayment($attr,$params){
        if($this->$attr&&$this->prop_damage){
            if($this->$attr==10&&$this->prop_damage!=6){
                $this->addError($attr,'Medical payments limit must be entered.');
            }
        }
    }
    /**
     * @param $attr
     * @param $param
     */
    public function validateOperatedInsured($attr,$param){
        if($this->occupied){
            $model = Occupancy::findOne($this->occupied);
            if($model){
                if(in_array($model->mer_serc,[1,2])&&!in_array($this->$attr,[1,2])){
                   $this->addError($attr,'Operated By Insured question requires a response.');
                }
            }
        }
    }
    /**
     * @param $attr
     * @param $params
     * validate amounts
     */
    public function validateAmount($attr,$params){
        if(!$this->building_amount_of_ins&&!$this->bus_amount_of_ins){
            $this->addError($attr,'An amount of Insurance must be entered for Building or Business Property');
        }

    }
    public function validateAmountBuilding($attr,$params){
        if($this->$attr&&($this->building_rc_acv==null||$this->building_rc_acv==3)){
            $this->addError($attr,'Replacement Cost or Actual Cash Value must be chosen for the Building');
        }
        if($this->$attr&&!$this->deductible_bldg){
            $this->addError('deductible_bldg','A Building Deductible must be chosen.');
        }

    }
    public function validateAmountBP($attr,$params){
        if($this->$attr&&($this->business_property_rc_acv==null||$this->business_property_rc_acv==3)){
            $this->addError($attr,'Replacement Cost or Actual Cash Value must be chosen for the Business Property');
        }
        if($this->$attr&&!$this->deductible_bp){
            $this->addError('deductible_bp','A Business Property Deductible must be chosen.');
        }
    }






}