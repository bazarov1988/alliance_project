<?php

namespace app\models\_base;
use app\models\Quotes;

use Yii;

/**
 * This is the model class for table "optional_liability_coverages".
 *
 * @property string $id
 * @property string $quote_id
 * @property integer $liability_form
 * @property integer $additional_insured
 * @property integer $additional_insured_number
 * @property integer $add_insured_owners_lessees
 * @property integer $add_insured_owners_contactors
 * @property integer $battery_exclusion
 * @property integer $barber_shop_liability
 * @property integer $emploees_full_time
 * @property integer $emploees_part_time
 * @property integer $emploees_barbers_time
 * @property integer $emploees_manicurists
 * @property integer $designated_premises
 * @property integer $contractual_liability_limitation
 * @property integer $project_only
 * @property integer $automobile_coverage
 * @property integer $automobile_coverage_agregate_a
 * @property integer $automobile_coverage_agregate
 * @property string $liquor_liability_receipts
 * @property integer $liquor_liability_restaurant
 * @property integer $liquor_liability_limit
 * @property integer $ls_46_liability
 * @property integer $ls_46_value
 * @property integer $acquired_entities
 * @property integer $exclusionary_endorsements
 * @property integer $all_hazards
 * @property integer $a_d_p_b
 * @property integer $athletic_participants
 * @property integer $certain_skin_care_service
 * @property integer $certain_skin_care_service_a
 * @property integer $discrimination_clarification
 * @property integer $employment_practices
 * @property integer $fairs
 * @property integer $known_loss_damage
 * @property integer $dry_cleaning_damage
 * @property integer $liquor_liability
 * @property integer $operations
 * @property integer $saddle_animals
 * @property integer $ice_control_operations
 * @property string $fire_legal
 * @property integer $fire_legal_settlement
 * @property integer $automobile_coverage_a
 * @property integer $personal_injury
 * @property integer $pool_liability
 * @property integer $completed_operations
 * @property integer $water_damage_exclusion
 * @property string $water_damage_exclusion_apartments
 * @property string $water_damage_exclusion_offices_in_ah
 * @property string $water_damage_exclusion_offices_in_ob
 * @property string $ls_dce
 * @property integer $water_damage_exclusion_store_in_ah
 * @property integer $water_damage_exclusion_store_in_ob
 * @property integer $extended_pollution_exclusion
 * @property integer $ls_25_value
 * @property integer $ls_44a_value
 * @property integer $ls_22a_value
 */
class BaseOptionalLiabilityCoverages extends \yii\db\ActiveRecord
{
    // BT104
    var $exclusion_canine_related_injuries_damages = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'optional_liability_coverages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'quote_id', 'emploees_full_time', 'emploees_part_time', 'emploees_barbers_time', 'emploees_manicurists','additional_insured',
                'additional_insured_number','automobile_coverage', 'automobile_coverage_agregate_a', 'fire_legal_settlement',
                'automobile_coverage_a', 'automobile_coverage_agregate','barber_shop_liability', 'liquor_liability_restaurant',
                'liquor_liability_limit', 'liability_form','ls_46_value','ls_dce','amount_of_receipts'
            ],
                'integer'],
            [['add_insured_owners_lessees','add_insured_owners_contactors', 'battery_exclusion', 'designated_premises', 'contractual_liability_limitation', 'project_only',
                'acquired_entities', 'all_hazards', 'a_d_p_b', 'athletic_participants', 'certain_skin_care_service', 'certain_skin_care_service_a', 'discrimination_clarification',
                'employment_practices', 'fairs', 'known_loss_damage', 'dry_cleaning_damage', 'liquor_liability', 'operations', 'saddle_animals', 'ice_control_operations',
                'personal_injury', 'pool_liability', 'completed_operations', 'water_damage_exclusion','water_damage_exclusion_store_in_ah', 'water_damage_exclusion_store_in_ob'
                ,'extended_pollution_exclusion','ls_25_value','ls_44a_value','ls_22a_value'
            ],
                'integer','max'=>1,'min'=>0],
	        [['ls_46_liability'],'integer','max'=>5,'min'=>0],
            [['liquor_liability_receipts', 'water_damage_exclusion_apartments', 'water_damage_exclusion_offices_in_ah', 'water_damage_exclusion_offices_in_ob','fire_legal'], 'number'],
            [['liability_form'],'validateLiabilityForm'],
            [['designated_premises'],'validateDesignatedPremises'],
            [['contractual_liability_limitation'],'validateLiabilityLimitation'],
            [['automobile_coverage'],'validateAutomobileCoverage'],
            [['acquired_entities'],'validateAcquiredEntities'],
            [['exclusionary_endorsements'],'validateEndorsements'],
            [['liquor_liability'],'validateLiquorLiability'],
            [['automobile_coverage_a'],'validateAutomobileCoverageA'],
            [['water_damage_exclusion'],'validateWaterDamageExclusion'],
            [['water_damage_exclusion_store_in_ah'],'validateWaterDamageExclusionStoreInAh'],
            [['water_damage_exclusion_store_in_ob'],'validateWaterDamageExclusionStoreInOb'],
            [['water_damage_exclusion_apartments'],'validateApartments'],
            [['water_damage_exclusion_offices_in_ah'],'validateOfficesInAH'],
            [['water_damage_exclusion_offices_in_ob'],'validateOfficesInOB'],
            [['additional_insured'],'validateAdditionalInsured'],
            [['barber_shop_liability'],'validateBarberLiabilityForm'],
            [['fire_legal'],'validateFireLegal'],
            [['liquor_liability_limit'],'validateLiquorLiabilityLimit'],
            [['exclusionary_endorsements'],'safe'],
            [['ls_dce'],'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'quote_id' => Yii::t('app', 'Quote ID'),
            'liability_form' => Yii::t('app', 'Liability Form'),
            'additional_insured' => Yii::t('app', 'Additional Insured'),
            'additional_insured_number' => Yii::t('app', 'Number of Additional Insureds'),
            'add_insured_owners_lessees' => Yii::t('app', "Add'l Insured - Contractual - Owners & Lessees"),
            'add_insured_owners_contactors' => Yii::t('app', "Add'l Insured - Contractual - Contractors"),
            'battery_exclusion' => Yii::t('app', 'Assault & Battery Exclusion'),
            'barber_shop_liability' => Yii::t('app', 'Beauty or Barber Shop Liability'),
            'emploees_full_time' => Yii::t('app', 'Full Time'),
            'emploees_part_time' => Yii::t('app', 'Part Time'),
            'emploees_barbers_time' => Yii::t('app', 'Barbers'),
            'emploees_manicurists' => Yii::t('app', 'Manicurists'),
            'designated_premises' => Yii::t('app', 'Business Premises Exclusion -  Other Than Designated Premises'),
            'contractual_liability_limitation' => Yii::t('app', 'Contractual Liability Limitation'),
            'project_only' => Yii::t('app', 'Cov. Applicable to Desig. Prem. or Project Only'),
            'automobile_coverage' => Yii::t('app', "Employers' Non-ownership Automobile Coverage"),
            'automobile_coverage_agregate_a' => Yii::t('app', 'Aggregate'),
            'automobile_coverage_agregate' => Yii::t('app', 'Aggregate'),

            'liquor_liability_receipts' => Yii::t('app', 'Receipts'),
            'liquor_liability_restaurant' => Yii::t('app', 'Restaurant/Mercaitile/ Bed&Breakfast'),
            'liquor_liability_limit' => Yii::t('app', 'Limit'),

            'acquired_entities' => Yii::t('app', 'Exclusion of Newly Acquired Entities'),
            'exclusionary_endorsements' => Yii::t('app', 'Exclusionary Endorsements'),
            'all_hazards' => Yii::t('app', 'All Hazards in Connection with Desig. Premises'),
            'a_d_p_b' => Yii::t('app', 'Asbestos, Dioxin or Polychlor. Biphenols'),
            'athletic_participants' => Yii::t('app', 'Athletic Participants'),
            'certain_skin_care_service' => Yii::t('app', 'Certain Skin Care Service'),
            'certain_skin_care_service_a' => Yii::t('app', 'Certain Skin Care Service'),
            'discrimination_clarification' => Yii::t('app', 'Discrimination Clarification'),
            'employment_practices' => Yii::t('app', 'Employment Practices'),
            'fairs' => Yii::t('app', 'Fairs'),
            'known_loss_damage' => Yii::t('app', 'Known Loss or Damage'),
            'dry_cleaning_damage' => Yii::t('app', 'Laundry & Dry Cleaning Damage'),
            'liquor_liability' => Yii::t('app', 'Modification of Liquor Liability'),
            'operations' => Yii::t('app', 'Operations'),
            'saddle_animals' => Yii::t('app', 'Saddle Animals'),
            'ice_control_operations' => Yii::t('app', 'Snow/ Ice Control Operations'),
            'extended_pollution_exclusion' => Yii::t('app', 'Extended Pollution Exclusion'),
            'fire_legal' => Yii::t('app', 'Fire Legal'),
            'fire_legal_settlement' => Yii::t('app', 'Settlement'),
            'automobile_coverage_a' => Yii::t('app', 'Hired and Non-owned Automobile Coverage'),
            'personal_injury' => Yii::t('app', 'Personal Injury'),
            'pool_liability' => Yii::t('app', 'Pool Liability'),
            'completed_operations' => Yii::t('app', 'Products/Completed Operations - remove'),
            'water_damage_exclusion' => Yii::t('app', 'Water Damage Exclusion - New York  City'),
            'water_damage_exclusion_apartments' => Yii::t('app', '# Apartments'),
            'water_damage_exclusion_offices_in_ah' => Yii::t('app', '# Offices in apartment house'),
            'water_damage_exclusion_offices_in_ob' => Yii::t('app', '# Offices in other building'),
            'water_damage_exclusion_store_in_ah' => Yii::t('app', 'Store in apartment house'),
            'water_damage_exclusion_store_in_ob' => Yii::t('app', 'Store in other building'),
            'exclusion_canine_related_injuries_damages' => Yii::t('app', 'Exclusion of Canine Related Injuries or Damages'),
            'ls_46_liability' => Yii::t('app', "Morticians' or Cemetery Coverage"),
            'ls_46_value' => Yii::t('app', '# of bodies'),
	        'ls_dce'=>Yii::t('app','Day Care Exclusion'),
	        'amount_of_receipts'=>Yii::t('app','Amount of receipts'),
	        'ls_25_value'=>Yii::t('app','ADDITIONAL INSURED (State or Political Sub-divisions-Permits Relating to Premises)'),
	        'ls_44a_value'=>Yii::t('app','BEAUTY OR BARBER SHOP LIABILITY'),
	        'ls_22a_value'=>Yii::t('app','BEAUTY OR BARBER SHOP LIABILITY'),
        ];
    }


    /**
     * @return array
     * form numbers array
     */
    public function formNumbers(){
        return [
            'add_insured_owners_lessees'            => 'LS-24',
            'add_insured_owners_contactors'         => 'LS-24A',
            'additional_insured'                    => 'LS-21',
            'designated_premises'                   => 'LS-70',
            'contractual_liability_limitation'      => 'LS-92',
            'project_only'                          => 'LS-70A',
            'automobile_coverage'                   => 'LS-50',
            'acquired_entities'                     => 'LS-91',
            'all_hazards'                           => 'LS-17',
            'a_d_p_b'                               => 'LS-87',
            'athletic_participants'                 => 'LS-14',
            'certain_skin_care_service'             => 'LS-76',
            'certain_skin_care_service_a'           => 'LS-76A',
            'discrimination_clarification'          => 'LS-88',
            'employment_practices'                  => 'LS-93',
            'fairs'                                 => 'LS-36',
            'known_loss_damage'                     => 'LS-85',
            'dry_cleaning_damage'                   => 'LS-15',
            'liquor_liability'                      => 'LS-31',
            'operations'                            => 'LS-18',
            'saddle_animals'                        => 'LS-72',
            'ice_control_operations'                => 'LS-79',
            'exclusion_canine_related_injuries_damages'  => 'LS-373',
            'extended_pollution_exclusion'          => 'LS-89',
            'fire_legal'                            => '*',
            'automobile_coverage_a'                 => 'LS-50A',
            'liquor_liability_receipts'             => 'LS-34',
            'personal_injury'                       => '*',
            'water_damage_exclusion'                => 'LS-75',
            'battery_exclusion'                     => 'LS-73',
            'ls_46_liability'                       => 'LS-46',
	        'ls_dce'                                => 'LS-DCE',
	        'amount_of_receipts'                    => 'LS-47'
        ];
    }
    public function getQuote()
    {
        return $this->hasOne(Quotes::className(),['id' => 'quote_id']);
    }
    /**
     * @param $attr
     * @return null
     * get form number by attribute name
     */
    public function getFormNumber($attr){
        if( array_key_exists($attr, $this->formNumbers()) ){
            return $this->formNumbers()[$attr];
        } else {
            return null;
        }
    }




    /**
     * @param $attr
     * @param $params
     * custom validators
     */
    public function validateLiabilityForm($attr,$params){
        if($_POST['Quotes']['prop_damage']==6&&$this->$attr&&$this->$attr!=4){
            $this->addError($attr,'The BI & PD limit must be entered for a Liability Form to Apply.');
        }
        if($_POST['Quotes']['policy_type']==2&&$this->$attr==1){
            $this->addError($attr,'The form LS-1 is not available on a Deluxe Policy.');
        }
    }

    public function validateDesignatedPremises($attr,$params){
        if($this->$attr&&$this->liability_form==1){
            $this->addError('Form LS-70 - Business Premises Exclusion Other than Designed Premises is not available on LS-1.');
        }
    }

    public function validateLiabilityLimitation($attr,$params){
        if($this->$attr&&$this->liability_form!=3){
            $this->addError($attr,'Contractual Liability limitation is only available with LS-6.');
        }
    }

    public function validateAutomobileCoverage($attr,$params){
        if($this->$attr>1&&$this->$attr<5){
            if($this->automobile_coverage_agregate&&($this->$attr > $this->automobile_coverage_agregate)){
                $this->addError($attr,'The Employers Non Owned Auto occurrence limit must be less than aggregate.');
            }
        }
        elseif($this->$attr==5){
            if(!empty($this->automobile_coverage_agregate)&&$this->automobile_coverage_agregate!=6){
                $this->addError($attr,'The Employers Non Owned Auto occurrence limit must be entered to have Aggregate.');
            }
        }
    }

    public function validateAcquiredEntities($attr,$params){
        if($this->$attr){
            if($this->liability_form!=3){
                $this->addError($attr,'Exclusion of Newly Acquired Entities is only available with a LS-6.');
            }
        }
    }
    public function validateEndorsements($attr,$params){
        if($this->$attr){
            if(!in_array($this->liability_form,[2,3])){
                $this->addError($attr,'Operations Exclusionary Endorsements is only available with a LS-5 or LS-6.');
            }
        }
    }
    public function validateLiquorLiability($attr,$params){
        if($this->$attr){
            if($this->liability_form==3){
                $this->addError($attr,'Modification of Liquor Liability Exclusionary Endorsement is not necessary with LS-6.');
            }
        }
    }

    public function validateAutomobileCoverageA($attr,$params){
        if($this->$attr>1&&$this->$attr<5){
            if($this->automobile_coverage_agregate_a&&$this->$attr>$this->automobile_coverage_agregate_a){
                $this->addError($attr,'The Hired and Non Owned Auto occurrence limit must be less than aggregate.');
            }
        }
        elseif($this->$attr==5){
            if($this->automobile_coverage_agregate_a&&$this->automobile_coverage_agregate_a!=6){
                $this->addError($attr,'The Hired and Non Owned Auto occurrence limit must be entered to have Aggregate.');
            }
        }
    }

    public function validateWaterDamageExclusion($attr,$params){
        if($this->$attr){
            if($_POST['Quotes']['zone']!=3){
                $this->addError($attr,'Water Damage Exclusion is only available in New York City Zone.');
            }
            if(empty($this->water_damage_exclusion_apartments)&&empty($this->water_damage_exclusion_offices_in_ah)&&empty($this->water_damage_exclusion_offices_in_ob)){
                if(!$this->water_damage_exclusion_store_in_ah&&!$this->water_damage_exclusion_store_in_ob){
                    $this->addError($attr,'Enter required information for Water Damage Exclusion.');
                }
            }

        }

    }
    public function validateWaterDamageExclusionStoreInAh($attr,$params){
        if($this->$attr&&!$this->water_damage_exclusion){
            $this->addError($attr,'Store in apartment house can apply only if the Water Damage Exclusion applies.');
        }
    }
    public function validateWaterDamageExclusionStoreInOb($attr,$params){
        if($this->$attr&&!$this->water_damage_exclusion){
            $this->addError($attr,'Store in other building can apply only if the Water Damage Exclusion applies.');
        }
    }
    public function validateAdditionalInsured($attr,$params){
        if(!empty($this->$attr)&&$this->$attr!=5){
            if(empty($this->additional_insured_number)){
                $this->addError($attr,'Number of Additional Insureds must be entered.');
            }
        } elseif(empty($this->$attr)||$this->$attr==5){
            if(!empty($this->additional_insured_number)){
                $this->addError($attr,'Additional Insured Form must be chosen.');
            }
        }
    }

    public function validateBarberLiabilityForm($attr,$params){
        $summ = $this->emploees_full_time+$this->emploees_part_time+$this->emploees_barbers_time+$this->emploees_manicurists;
        if(!empty($this->$attr)&&$this->$attr!=6){
            if($summ==0){
                $this->addError($attr,'Number of Beauty or Barber Shop Employees must be entered.');
            }
        } elseif(empty($this->$attr)||$this->$attr==6){
            if($summ!=0){
                $this->addError($attr,'Limit for Beauty or Barber Shop Liability must be chosen.');
            }
        }
    }

    public function validateFireLegal($attr,$params){
        if(!empty($this->$attr)){
            if(empty($this->fire_legal_settlement)||$this->fire_legal_settlement==3){
                $this->addError($attr,'Fire Legal Settlement Type must be chosen.');
            }
        } else {
            if(!empty($this->fire_legal_settlement)&&$this->fire_legal_settlement!=3){
                $this->addError($attr,'Limit for Fire Legal Liability must be entered.');
            }
        }
    }

    public function validateLiquorLiabilityLimit($attr,$params){
        if(!empty($this->$attr)&&$this->$attr!=5){
            if(empty($this->liquor_liability_receipts)){
                $this->addError('liquor_liability_receipts','Liquor Liability Receipts must be entered.');
            }
            if(empty($this->liquor_liability_restaurant)||$this->liquor_liability_restaurant==4){
                $this->addError('liquor_liability_restaurant','Liquor Liability Occupancy must be chosen.');
            }
        } elseif(empty($this->$attr)||$this->$attr==5) {
            if(!empty($this->liquor_liability_receipts)){
                $this->addError('liquor_liability_receipts','Limit for Liquor Liability must be entered.');
            }
        }
        if(empty($this->liquor_liability_restaurant)||$this->liquor_liability_restaurant==4){
            if(!empty($this->liquor_liability_receipts)){
                $this->addError('liquor_liability_restaurant','Liquor Liability Occupancy must be chosen.');
            }
        }
    }

    public function validateOfficesInAH($attr,$params){
        if(!empty($this->$attr)&&!$this->water_damage_exclusion){
            $this->addError($attr,'Number of Offices in apartment house can be entered only if the Water Damage Exclusion applies.');
        }
    }
    public function validateOfficesInOB($attr,$params){
        if(!empty($this->$attr)&&!$this->water_damage_exclusion){
            $this->addError($attr,'Number of Offices in Other Buildings can be entered only if the Water Damage Exclusion applies.');
        }
    }
    public function validateApartments($attr,$params){
        if(!empty($this->$attr)&&!$this->water_damage_exclusion){
            $this->addError($attr,'Number of Apartments can be entered only if the Water Damage Exclusion applies.');
        }
    }

}
