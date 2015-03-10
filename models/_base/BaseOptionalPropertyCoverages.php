<?php

namespace app\models\_base;

use Yii;

/**
 * This is the model class for table "optional_property_coverages".
 *
 * @property string $id
 * @property string $quote_id
 * @property string $accounts_receivable
 * @property string $additional_expense
 * @property integer $alcoholic_beverages_tax_exclusion
 * @property integer $building_inflation_protection
 * @property integer $businessowners_agreed_amount
 * @property string $businessowners_burglary_robbery
 * @property integer $cause_of_loss_building
 * @property integer $cause_of_loss_business_property
 * @property string $computer_coverage
 * @property integer $deductible
 * @property integer $cooking_protection_equip
 * @property string $customers_goods
 * @property string $agreement_one
 * @property string $agreement_two
 * @property string $agreement_three
 * @property string $building_limit
 * @property string $bus_prop_limit
 * @property string $masonry_veneer
 * @property string $employee_dishonesty
 * @property integer $equipment_breakdown
 * @property string $exterior_signs
 * @property integer $cost_provision
 * @property string $loss_off_income_month
 * @property integer $loss_of_income
 * @property integer $loss_of_income_sf
 * @property integer $building_increment
 * @property integer $bus_prop_increment
 * @property integer $loss_payable
 * @property string $money_securities
 * @property string $direct_damages
 * @property integer $damages_transmission_lines
 * @property integer $damages_deductible
 * @property string $time_element
 * @property integer $time_transmission_lines
 * @property integer $time_deductible
 * @property string $demolition_amount
 * @property string $increased_cost
 * @property string $building_glass
 * @property integer $curved
 * @property integer $plates
 * @property $string $ornamental_work
 * @property string $refrigerated_food
 * @property integer $food_deductible
 * @property string $refrigerated_property
 * @property integer $refrigerated_property_deductible
 * @property integer $season_variation
 * @property string $add_mos
 * @property integer $number_of_additional
 * @property integer $sprinkler_leakage
 * @property integer $add_increment
 * @property integer $storekeepers_burglary_robbery
 * @property integer $storekeepers_burglary_robbery_deductible
 * @property string $burglary_of_money
 * @property string $theft_of_money
 * @property string $tenant_Improvements_one
 * @property string $tenant_Improvements_a
 * @property string $valuable_papers
 * @property integer $insured_premises
 * @property integer $insured_premises_ten
 * @property integer $insured_premises_a
 * @property integer $insured_premises_a_ten
 */
class BaseOptionalPropertyCoverages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'optional_property_coverages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quote_id', 'building_inflation_protection', 'cause_of_loss_building', 'cause_of_loss_business_property', 'cost_provision', 'loss_off_income_month', 'building_increment', 'bus_prop_increment', 'damages_transmission_lines','time_transmission_lines', 'number_of_additional', 'add_increment', 'storekeepers_burglary_robbery', 'insured_premises', 'insured_premises_ten', 'insured_premises_a_ten','loss_off_income_month'], 'integer'],
            [['accounts_receivable','additional_expense','employee_dishonesty','exterior_signs','money_securities','valuable_papers','increased_cost','demolition_amount','building_limit', 'bus_prop_limit',],'number'],
            [['building_increment', 'bus_prop_increment'],'integer','max'=>5],
            [['deductible', 'damages_deductible', 'time_deductible', 'food_deductible','refrigerated_property_deductible','storekeepers_burglary_robbery_deductible'],'integer','max'=>8],
            [['alcoholic_beverages_tax_exclusion', 'businessowners_agreed_amount', 'cooking_protection_equip', 'equipment_breakdown',
                'loss_of_income_sf', 'loss_of_income','loss_payable','season_variation','sprinkler_leakage','insured_premises_a', 'curved', 'plates'],
                'integer','max'=>1,'min'=>0],
            [['masonry_veneer'],'integer','max'=>2,'min'=>1],
            [['accounts_receivable', 'additional_expense', 'businessowners_burglary_robbery', 'computer_coverage', 'customers_goods', 'agreement_one', 'agreement_two', 'agreement_three',  'money_securities', 'direct_damages', 'time_element', 'building_glass', 'refrigerated_food', 'refrigerated_property', 'add_mos', 'burglary_of_money', 'theft_of_money', 'tenant_Improvements_one', 'tenant_Improvements_a', 'valuable_papers','ornamental_work'], 'number'],
            [['building_inflation_protection'],'validateBuildingInflation'],
            [['cause_of_loss_building'],'validateLossBuilding'],
            [['cause_of_loss_business_property'],'validateLossBP'],
            [['loss_of_income_sf'],'validateLossIncome'],
            [['add_mos'],'validateSeasonalVariationMos'],
            [['number_of_additional'],'validateSeasonalVariationPersent'],
            [['sprinkler_leakage'],'validateSprinklerLeakage'],
            [['insured_premises_ten'],'validateWhileAway'],
            [['insured_premises_a'],'validateWhileAwayA'],
            [['insured_premises_a_ten'],'validateWhileAwayAIncrement'],
            [['customers_goods'],'validateCustomersGoods'],
            [['agreement_one','agreement_two','agreement_three'],'validateDemolitionAmount'],
            [['demolition_amount'],'validateDemolitionAmount'],
            [['increased_cost'],'validateIncreasedCost'],
            [['building_limit'],'validateBuildingLimit'],
            [['bus_prop_limit'],'validateBusPropLimit'],
            [['deductible'],'validateDeductible'],
            [['direct_damages'],'validateDirectDamages'],
            [['time_element'],'validateTimeElement'],
            [['demolition_amount'],'validateDemolitionAmount'],
            [['refrigerated_food'],'validateRefrigeratedFood'],
            [['refrigerated_property'],'validateRefrigeratedProperty'],
            [['storekeepers_burglary_robbery'],'validateStorekeepersBurglaryRobbery'],
            [['businessowners_burglary_robbery'],'validateBusinessownersBurglaryRobbery'],
            [['tenant_Improvements_one'],'validateTenantImprovementsOne'],
            [['tenant_Improvements_a'],'validateTenantImprovementsA'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'quote_id' => Yii::t('app', 'quote ID'),
            'accounts_receivable' => Yii::t('app', 'Accounts Receivable'),
            'additional_expense' => Yii::t('app', 'Additional Expense'),
            'alcoholic_beverages_tax_exclusion' => Yii::t('app', 'Alcoholic Beverages Tax Exclusion'),
            'building_inflation_protection' => Yii::t('app', 'Building Inflation Protection  ( % each 3 months )'),
            'businessowners_agreed_amount' => Yii::t('app', 'Businessowners Agreed Amount'),
            'businessowners_burglary_robbery' => Yii::t('app', 'Businessowners Burglary & Robbery'),
            'cause_of_loss_building' => Yii::t('app', 'Cause of Loss - Building'),
            'cause_of_loss_business_property' => Yii::t('app', 'Cause Of Loss Business Property'),
            'computer_coverage' => Yii::t('app', 'Computer Coverage'),
            'deductible' => Yii::t('app', 'Deductible'),
            'cooking_protection_equip' => Yii::t('app', 'Cooking Protection Equip. Accidental Leakage'),
            'customers_goods' => Yii::t('app', 'Customers Goods'),
            'agreement_one' => Yii::t('app', '(Agreement 1)'),
            'agreement_two' => Yii::t('app', '(Agreement 2)'),
            'agreement_three' => Yii::t('app', '(Agreement 3)'),
            'building_limit' => Yii::t('app', 'Building Limit'),
            'bus_prop_limit' => Yii::t('app', 'Bus. Prop. Limit'),
            'masonry_veneer' => Yii::t('app', 'Masonry Veneer?'),
            'employee_dishonesty' => Yii::t('app', 'Employee Dishonesty'),
            'equipment_breakdown' => Yii::t('app', 'Equipment Breakdown'),
            'exterior_signs' => Yii::t('app', 'Exterior Signs'),
            'cost_provision' => Yii::t('app', 'Functional Replacement Cost Provision'),
            'loss_off_income_month' => Yii::t('app', 'Loss of Income (additional months)'),
            'loss_of_income' => Yii::t('app', 'Loss Of Income'),
            'loss_of_income_sf' => Yii::t('app', 'Loss Of Income'),
            'building_increment' => Yii::t('app', "add'l 10% Building increments"),
            'bus_prop_increment' => Yii::t('app', "add'l 10% Bus. Prop. increments"),
            'loss_payable' => Yii::t('app', 'Loss Payable'),
            'money_securities' => Yii::t('app', 'Money & Securities'),
            'direct_damages' => Yii::t('app', 'Direct Damages'),
            'damages_transmission_lines' => Yii::t('app', 'Transmission Lines'),
            'damages_deductible' => Yii::t('app', 'Deductible'),
            'time_element' => Yii::t('app', 'Time Element'),
            'time_transmission_lines' => Yii::t('app', 'Transmission Lines'),
            'time_deductible' => Yii::t('app', 'Deductible'),
            'demolition_amount' => Yii::t('app', 'Demolition Amount'),
            'increased_cost' => Yii::t('app', 'Increased Cost of Construction'),
            'building_glass' => Yii::t('app', 'Outside Grade Floor Building Glass ( linear feet )'),
            'curved' => Yii::t('app', 'Curved, Thermopane, etc'),
            'plates' => Yii::t('app', 'Plates with burglary alarm foil'),
            'ornamental_work' => Yii::t('app', 'Value of Lettering or Ornamental Work'),
            'refrigerated_food' => Yii::t('app', 'Refrigerated Food Products-Food Spoilage'),
            'food_deductible' => Yii::t('app', 'Deductible'),
            'refrigerated_property' => Yii::t('app', 'Refrigerated Property'),
            'refrigerated_property_deductible' => Yii::t('app', 'Deductible'),
            'season_variation' => Yii::t('app', 'Seasonal Variation'),
            'add_mos' => Yii::t('app', "Add'l mos."),
            'number_of_additional' => Yii::t('app', "Number of additional 5%"),
            'sprinkler_leakage' => Yii::t('app', 'Sprinkler Leakage'),
            'add_increment' => Yii::t('app', "add'l 10% increments"),
            'storekeepers_burglary_robbery' => Yii::t('app', 'Storekeepers Burglary and Robbery'),
            'storekeepers_burglary_robbery_deductible' => Yii::t('app', 'Deductible'),
            'burglary_of_money' => Yii::t('app', 'Burglary of money & securites within premises'),
            'theft_of_money' => Yii::t('app', 'Theft of money & securities within the premises'),
            'tenant_Improvements_one' => Yii::t('app', "Tenant's Improvements and Betterments"),
            'tenant_Improvements_a' => Yii::t('app', "Tenant's Improvements and Betterments"),
            'valuable_papers' => Yii::t('app', 'Valuable Papers & Records'),
            'insured_premises' => Yii::t('app', 'While Away From Insured Premises'),
            'insured_premises_ten' => Yii::t('app', "add'l 10% increments"),
            'insured_premises_a' => Yii::t('app', 'While Away From Insured Premises'),
            'insured_premises_a_ten' => Yii::t('app', "add'l 10% increments"),
        ];
    }
    /**
     * @return array
     * form numbers array
     */
    public function formNumbers(){
        return [
            'alcoholic_beverages_tax_exclusion' => 'SF-105',
            'businessowners_agreed_amount'      => 'SF-28A',
            'businessowners_burglary_robbery'   => 'SF-55',
            'computer_coverage'                 => 'MR-61A',
            'cooking_protection_equip'          => 'SF-91',
            'customers_goods'                   => 'SF-132',
            'demolition_debris'                 => 'SF-101',
            'earthquake_coverage'               => 'SF-398',
            'equipment_breakdown'               => 'SF-345',
            'cost_provision'                    => 'SF-33',
            'loss_of_income'                    => 'SF-312',
            'loss_of_income_a'                  => 'SF-312A',
            'loss_payable'                      => 'SF-127',
            'direct_damages'                    => 'SF-94A',
            'time_element'                      => 'SF-95A',

            'season_variation'                  => '*',
            'sprinkler_leakage'                 => '*',
            'storekeepers_burglary_robbery'     => 'SF-58B',
            'tenant_Improvements_one'           => 'SF-135',
            'tenant_Improvements_a'             => 'SF-135A',
            'valuable_papers'                   => '*',
            'insured_premises'                  => '*',
            'insured_premises_a'                => 'SF-133A',
            'building_inflation_protection'     => '*',
            'accounts_receivable'               => '*',
            'additional_expense'                => '*',
            'cause_of_loss_building'            => '',
            'cause_of_loss_business_property'   => '',
            'employee_dishonesty'               => '*',
            'exterior_signs'                    => '*',
            'loss_off_income_month'             => '*'
        ];
    }

    /**
     * @param $attr
     * @return null
     * get form number by attribute name
     */
    public function getFormNumber($attr){
        if(!empty($this->formNumbers()[$attr])){
            return $this->formNumbers()[$attr];
        } else {
            return null;
        }
    }

    /**
     * @param $attr
     * @param $params
     * validation rules
     */
    public function validateBuildingInflation($attr,$params){
        if($this->$attr&&$this->$attr!=6&&(trim($_POST['Quotes']['building_amount_of_ins']))){
            $this->addError($attr,'You can not have Building Inflation Coverage if you do not have Building coverage');
        }
    }
    public function validateLossBuilding($attr,$params){
        if($this->$attr==1&&$_POST['Quotes']['policy_type']==2){
            $this->addError($attr,'The SF-1(Building) is not available on a Deluxe Policy.');
        }
        elseif($this->$attr&&$this->$attr!=4&&in_array($_POST['Quotes']['building_amount_of_ins'],['',0,' ',null])){
            $this->addError($attr,'You can not have Building Cause of Loss Form if you do not have Building coverage');
        }
        elseif($this->$attr==4&&!in_array($_POST['Quotes']['building_amount_of_ins'],['',0,' ',null])){
            $this->addError($attr,'You can not remove Building Cause of Loss Form if you have Building coverage');
        }$this->addError($attr, 'You can not have Demolition/Debris Removal (SF-102) if you do not have any Building Coverage.');
    }
    public function validateLossBP($attr,$params){
        if($this->$attr==1&&$_POST['Quotes']['policy_type']==2){
            $this->addError($attr,'The SF-1-(Business property) is not available on a Deluxe Policy.');
        }
        elseif($this->$attr==3&&$_POST['Quotes']['policy_type']==1){
            $this->addError($attr,'The SF-4 is not available on a Standard Policy.');
        }
        elseif($this->$attr&&$this->$attr!=5&&in_array($_POST['Quotes']['bus_amount_of_ins'],['',0,' ',null])){
            $this->addError($attr,'You can not have Business Property Cause of Loss Form if you do not have Business Property coverage');
        }
        elseif($this->$attr&&$this->$attr==5&&!in_array($_POST['Quotes']['bus_amount_of_ins'],['',0,' ',null])){
            $this->addError($attr,'You can not remove Business Property Cause of Loss Form if you  have Business Property coverage');
        }
    }
    public function validateLossIncome($attr,$params){
        if($this->$attr){
            if(in_array($_POST['Quotes']['building_amount_of_ins'],['',0,' ',null])){
                $this->addError($attr,'You can not have Building increments for Loss of Income (SF-312A) if you have no Building Coverage');
            }
            elseif(in_array($_POST['Quotes']['bus_amount_of_ins'],['',0,' ',null])){
                $this->addError($attr,'You can not have Business Property increments for Loss of Income (SF-312A) if you have no Business Property Coverage');
            }
        }
    }
    public function validateSeasonalVariationMos($attr,$params){
        if(!empty($this->$attr)){
            if(in_array($_POST['Quotes']['bus_amount_of_ins'],['',0,' ',null])){
                $this->addError($attr,'You can not use Seasonal Variation if you do not have any Business Property coverage.');
            }
            if($_POST['Quotes']['policy_type']==1&&!$this->season_variation){
                $this->addError($attr,'You must check the applies box if you entered additional months for Seasonal Variation.');
            }

        }
    }
    public function validateSeasonalVariationPersent($attr,$params){
        if($this->$attr&&$this->$attr!=16&&$_POST['Quotes']['policy_type']!=1){
            if(in_array($_POST['Quotes']['bus_amount_of_ins'],['',0,' ',null])){
                $this->addError($attr,'You can not use Seasonal Variation if you do not have any Business Property coverage.');
            }
        }
        elseif($_POST['Quotes']['policy_type']==1&&$this->$attr&&$this->$attr!=16&&!$this->loss_of_income_sf){
            $this->addError($attr,'In order to increase % of Seasonal Variation, Applies must be checked above.');
        }
    }
    public function validateSprinklerLeakage($attribute,$params){
        if($this->$attribute){
            if(in_array($_POST['Quotes']['bus_amount_of_ins'],['',0,' ',null])){
                $this->addError($attribute,'You can not use Sprinkler Leakage if you do not have any Business Property coverage.');
            }
        } else {
            if($_POST['Quotes']['policy_type']==1&&$this->add_increment){
                $this->addError($attribute,'Sprinkler Leakage must apply for Additional Increments to be chosen.');
            }
        }
    }

    public function validateWhileAway($attr,$params){
        if($this->$attr&&$this->$attr!=11){
            if(in_array($_POST['Quotes']['bus_amount_of_ins'],['',0,' ',null])){
                $this->addError($attr,'You can not use While Away From Insured Premises Coverage if you do not have any Business Property coverage.');
            }
        }
    }

    public function validateWhileAwayA($attr,$params){
        if($this->$attr){
            if(in_array($_POST['Quotes']['bus_amount_of_ins'],['',0,' ',null])){
                $this->addError($attr,'You can not use While Away From Insured Premises Coverage (SF-133A) if you do not have any Business Property coverage.');
            }
        }
    }
    public function validateWhileAwayAIncrement($attr,$params){
        if($this->$attr&&$this->$attr!=11){
            if(in_array($_POST['Quotes']['bus_amount_of_ins'],['',0,' ',null])){
                $this->addError($attr,'You can not use While Away From Insured Premises Coverage (SF-133A) if you do not have any Business Property coverage.');
            }
        }
    }

    public function validateCustomersGoods($attr,$params){
        if(!empty($this->$attr)&&empty($_POST['Quotes']['deductible_bp'])){
            $this->addError($attr,'You must enter a Business Property Deductible when Customers Goods Limit is entered');
        } elseif(!empty($this->$attr)&&empty($_POST['Quotes']['business_property_rc_acv'])){
            $this->addError($attr,'You must enter a Business Property Settlement(RC/ACV) when Customers Goods Limit is entered.');
        }
    }

    public function validateDemolition($attr,$params)
    {
      if (!empty($this->$attr) && empty($_POST['Quotes']['building_amount_of_ins'])) {
          $this->addError($attr, 'You can not have Demolition/Debris Removal (SF-101) if you do not have any Building Coverage.');
      }

    }

    public function validateDemolitionAmount($attr,$params){
        if (!empty($this->$attr) && empty($_POST['Quotes']['building_amount_of_ins'])) {
            $this->addError($attr, 'You can not have Demolition/Debris Removal (SF-102) if you do not have any Building Coverage.');
        }
        if(($this->$attr + $this->increased_cost)>0){
            if(empty($_POST['Quotes']['deductible_bldg'])){
                $this->addError($attr,'You must choose a Building Deductible when the Ordinance & Law Endorsement applies.');
            }
        }
    }

    public function validateIncreasedCost($attr,$params){
        if(!empty($this->$attr) && empty($_POST['Quotes']['building_amount_of_ins'])){
            $this->addError($attr, 'You can not have Increased Cost of Construction (SF-103) if you do not have any Building Coverage.');
        }
    }

    public function validateBusPropLimit($attr,$params){
        if(!empty($this->$attr)&&empty($_POST['Quotes']['bus_amount_of_ins'])){
            $this->addError($attr,'You can not have Earthquake Coverage on Business Property if you do not have any Business Property Coverage.');
        }
    }
    public function validateBuildingLimit($attr,$params){
        if(!empty($this->$attr)&&empty($_POST['Quotes']['building_amount_of_ins'])){
            $this->addError($attr,'You can not have Earthquake Coverage on Building if you do not have any Business Property Coverage.');
        }
    }

    public function validateDeductible($attr,$params){
        if(!$this->computer_coverage){
            if(!$this->$attr||$this->$attr==8){
                $this->addError($attr,'You must choose a Deductible amount for Computer Coverage.');
                $this->addError('computer_coverage','You must choose a Deductible amount for Computer Coverage.');
            }
        }
    }

    public function validateDirectDamages($attr,$params){
        if(!empty($this->$attr)){
            if(empty($this->damages_transmission_lines)||$this->damages_transmission_lines==3){
                $this->addError($attr,'You must  choose Excluding/Including Transmission Lines for Off Premises (SF-94A) Coverage.');
                $this->addError('damages_transmission_lines','You must  choose Excluding/Including Transmission Lines for Off Premises (SF-94A) Coverage.');
            }
            if(empty($this->damages_deductible)||$this->damages_deductible==8){
                $this->addError($attr,'You must  choose Excluding/Including Transmission Lines for Off Premises (SF-94A) Coverage.');
                $this->addError('damages_deductible','You must  choose Deductible amount for Off Premises (SF-94A) Coverage.');
            }
        }
    }

    public function validateTimeElement($attr,$params){
        if(!empty($this->$attr)){
            if(empty($this->time_transmission_lines)||$this->time_transmission_lines==3){
                $this->addError($attr,'You must  choose Excluding/Including Transmission Lines for Off Premises (SF-95A) Coverage.');
                $this->addError('time_transmission_lines','You must  choose Excluding/Including Transmission Lines for Off Premises (SF-95A) Coverage.');
            }
            if(empty($this->time_deductible)||$this->time_deductible==8){
                $this->addError($attr,'You must  choose Excluding/Including Transmission Lines for Off Premises (SF-95A) Coverage.');
                $this->addError('time_deductible','You must  choose Deductible amount for Off Premises (SF-95A) Coverage.');
            }
        }
    }

    public function validateRefrigeratedFood($attr,$params){
        if(!empty($this->$attr)&&empty($this->food_deductible)){
            $this->addError($attr,'You must choose a Deductible amount for Refrigerated Food Coverage.');
            $this->addError('food_deductible','You must choose a Deductible amount for Refrigerated Food Coverage.');
        }
    }

    public function validateRefrigeratedProperty($attr,$params){
        if(!empty($this->$attr)&&empty($this->refrigerated_property_deductible)){
            $this->addError($attr,'You must choose a Deductible amount for Refrigerated Food Coverage.');
            $this->addError('refrigerated_property_deductible','You must choose a Deductible amount for Refrigerated Property Coverage.');
        }
    }

    public function validateStorekeepersBurglaryRobbery($attr,$params){
        if($this->$attr&&$this->$attr!=8){
            if(empty($this->storekeepers_burglary_robbery_deductible)){
                $this->addError($attr,'You must choose a Deductible amount for Storekeepers Burglary and Robbery Coverage.');
                $this->addError('storekeepers_burglary_robbery_deductible','You must choose a Deductible amount for Storekeepers Burglary and Robbery Coverage.');
            }
        }
    }

    public function validateBusinessownersBurglaryRobbery($attr,$params){
        if(!empty($this->$attr)){
            if($this->$attr > $_POST['Quotes']['building_amount_of_ins']*0.25){
                $this->addError($attr,'The amount of insurance for Businessowners Burglary and Robbery must be less than or equal to 25% of the Business Property Limit.');
            }
            if($_POST['Quotes']['policy_type']==2&&$this->cause_of_loss_business_property!=2&&$this->cause_of_loss_business_property!=4){
                $this->addError($attr,'SF-4 already includes theft coverage, the Businessowner Burglary and Robbery Coverage is not nessessary.');
            }
        }
    }

    public function validateTenantImprovementsOne($attr,$params){
        if(!empty($this->$attr)){
            if(empty($_POST['Quotes']['building_rc_acv'])||$_POST['Quotes']['building_rc_acv']==3){
                $this->addError($attr,'You must choose Building Settlment (RC / ACV) when Tenants Improvements & Betterments applies.');
            }
            if(empty($_POST['Quotes']['deductible_bldg'])){
                $this->addError($attr,'You must choose a Building Deductible when Tenants Improvements & Betterments applies.');
            }
        }
    }
    public function validateTenantImprovementsA($attr,$params){
        if(!empty($this->$attr)){
            if(empty($_POST['Quotes']['building_rc_acv'])||$_POST['Quotes']['building_rc_acv']==3){
                $this->addError($attr,'You must choose Building Settlment (RC / ACV) when Tenants Improvements & Betterments (SF-135A) applies.');
            }
            if(empty($_POST['Quotes']['deductible_bldg'])){
                $this->addError($attr,'You must choose a Building Deductible when Tenants Improvements & Betterments (SF-135A) applies.');
            }
        }
    }
    /**
     * Validation rules
     */
}
