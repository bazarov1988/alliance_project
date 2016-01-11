<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 27.02.15
 * Time: 18:59
 */

namespace app\models;
use app\models\_base\BaseOptionalPropertyCoverages;


class OptionalPropertyCoverages extends BaseOptionalPropertyCoverages {



    private $deductible_bp;
    private $deductible_building;
    private $rate_bp;
    private $rate_building;
    /**
     * relations
     */
    public function getQuote()
    {
        return $this->hasOne(Quotes::className(),['id' => 'quote_id']);
    }
    /**
     * relations
     */

    public function getDeductibleFactorBP(){
        if(!$this->deductible_bp){
            $this->deductible_bp = $this->quote->getDeductibleFactorBP();
        }
        return $this->deductible_bp;
    }


    public function getDeductibleFactorBuilding(){
        if(!$this->deductible_building){
            $this->deductible_building = $this->quote->getDeductibleFactorBuilding();
        }
        return $this->deductible_building;
    }

    public function getTableRateBP(){
        if(!$this->rate_bp){
            $this->rate_bp = $this->quote->getTableRateBP();
        }
        return $this->rate_bp;
    }


    public function getTableRateBuilding(){
        if(!$this->rate_building){
            $this->rate_building = $this->quote->getTableRateBuilding();
        }
        return $this->rate_building;
    }

    /**
     * @param $deductibleBP
     * @return float|int
     * get account receivable
     */
    public function getAccountsReceivableDeductible(){
        return $this->getDeductibleFactorBP();
    }
    public function getAccountsReceivablePremium(){
        $deductibleBP = $this->getAccountsReceivableDeductible();
        if(!empty($deductibleBP)){
	        $add = 0;
	        if($this->quote->policy_type == 2){
		        $add=1000;
	        }
            return round(($this->accounts_receivable/1000)*$deductibleBP*\Yii::$app->params['quote']['option_coverage_rates']['accounts'],0)+$add;
        } else {
            return 0;
        }
    }

    /**
     * @return float
     * get Additional Expense premium
     */
    public function getAdditionalExpensePremium(){
        return round(($this->additional_expense/1000)*\Yii::$app->params['quote']['option_coverage_rates']['additional'],0);
    }

    /**
     * @return int
     * get alcoholic beverages tax exclusion
     */
    public function getAlcoholicBeveragesTaxExclusion(){
        return (int)$this->alcoholic_beverages_tax_exclusion;
    }

    /**
     * @return int
     * -------------------------------------------get Building Inflation Protection premium-----------------------------------
     */
    public function getBuildingInflationProtectionRate(){
        return (!empty($this->building_inflation_protection)&&!empty(\Yii::$app->params['quote']['building_inflation'][$this->building_inflation_protection]))?\Yii::$app->params['quote']['building_inflation'][$this->building_inflation_protection][1]:0;
    }
    public function getBuildingInflationProtectionPremium(){
        $quote = $this->quote;
        $rate = $this->getBuildingInflationProtectionRate();
        if($rate==0) return 0;
        $bldgPremium = $quote->getBldgComposite();
        if($bldgPremium==0) return 0;
        return round($rate*$bldgPremium,0);
    }
    /**
     * @return int
     * -------------------------------------------get Building Inflation Protection premium-----------------------------------
     */




    public function getBusinessownersAgreedAmount(){
        return (int)$this->businessowners_agreed_amount;
    }

    /**
     * @return mixed
     * -------------------------------------------------------BusinessownersBurglaryRobbery------------------------
     */
    public function getBusinessownersBurglaryRobberyDeductible(){
        return $this->getDeductibleFactorBP();
    }

    public function getBusinessownersBurglaryRobberyPremium(){
        $bx3 = ($this->businessowners_burglary_robbery>5000)?5000:$this->businessowners_burglary_robbery;
        $bx4 = ($this->businessowners_burglary_robbery>15000)?10000:($this->businessowners_burglary_robbery-$bx3);
        $bx5 = ($this->businessowners_burglary_robbery>25000)?10000:($this->businessowners_burglary_robbery-($bx3+$bx4));
        $bx6 = ($this->businessowners_burglary_robbery>25000)?($this->businessowners_burglary_robbery-25000):0;
        $crimeGroup = $this->quote->occupancy?$this->quote->occupancy->crime_group:0;
        $bz3 = (!empty($crimeGroup))?\Yii::$app->params['quote']['burglary_robbery_cov'][0][$crimeGroup]:0;
        $bz4 = (!empty($crimeGroup))?\Yii::$app->params['quote']['burglary_robbery_cov'][1][$crimeGroup]:0;
        $bz5 = (!empty($crimeGroup))?\Yii::$app->params['quote']['burglary_robbery_cov'][2][$crimeGroup]:0;
        $bz6 = (!empty($crimeGroup))?\Yii::$app->params['quote']['burglary_robbery_cov'][3][$crimeGroup]:0;

        $premium = ($bx3/1000)*$bz3 + ($bx4/1000)*$bz4 + ($bx5/1000)*$bz5 + ($bx6/1000)*$bz6;
        $deductible = $this->getBusinessownersBurglaryRobberyDeductible();
        $terrMult = 0;
        if(in_array($this->quote->country,[30,40,44,52,60])){
            $terrMult = \Yii::$app->params['quote']['bop_burg_terr_mult'][0][2];
        } elseif(in_array($this->quote->country,[3,24,31,41,43])){
            $terrMult = \Yii::$app->params['quote']['bop_burg_terr_mult'][1][2];
        } else {
            $terrMult = \Yii::$app->params['quote']['bop_burg_terr_mult'][2][2];
        }
        return round($premium*$deductible*$terrMult,0);
    }
    /**-
     * ---------------------------------------------Businessowners Burglary Robbery premium---------------------
     */


    /**
     * @return mixed
     * ---------------------------------------------------cause of loss methods------------------------------------
     */
    public function getCauseOfLossBuildingLimit(){
        return !empty($this->quote->building_amount_of_ins)?$this->quote->building_amount_of_ins:0;
    }
    public function getCauseOfLossBPLimit(){
        return !empty($this->quote->bus_amount_of_ins)?$this->quote->bus_amount_of_ins:0;
    }
    public function getCauseOfLossBuildingDeductible(){
        return $this->getDeductibleFactorBuilding();
    }
    public function getCauseOfLossBPDeductible(){
        return $this->getDeductibleFactorBP();
    }
    public function getCauseOfLossBuildingPremium(){
        $limit = $this->getCauseOfLossBuildingLimit();
        $deductible = $this->getCauseOfLossBuildingDeductible();
        $rate = 0;
        if(!empty($this->cause_of_loss_building)){
            $rate = \Yii::$app->params['quote']['building_cause_loss'][$this->cause_of_loss_building-1][$this->quote->policy_type];
        }
        return round(($limit/100)*$deductible*$rate,0);
    }
    public function getCauseOfLossBPPremium(){
        $limit = $this->getCauseOfLossBPLimit();
        $deductible = $this->getCauseOfLossBPDeductible();
        $rate = 0;
        if(!empty($this->cause_of_loss_business_property)){
            $rate = \Yii::$app->params['quote']['business_property_cause_loss'][$this->cause_of_loss_business_property-1][$this->quote->policy_type];
        }
        return round(($limit/100)*$deductible*$rate,0);
    }
    /**
     * ----------------------------------------------cause of loss methods---------------------------------------
     */

    /**
     * --------------------------------------------compute coverage---------------------------------------------
     */
    public function getComputerCoverageLimit(){
        return !empty($this->computer_coverage)?$this->computer_coverage:0;
    }
    public function getComputerCoverageRate(){
        return \Yii::$app->params['quote']['computer_coverage_rate'];
    }
    public function getComputerCoverageDeductible(){
    //=IF(AND(CI4<>"",CI4<>8,CI4<>0),VLOOKUP($'List Sheet'.$CI$4,$'List Sheet'.$AL$3:$AN$9,3,FALSE()),0)
        if(!empty($this->deductible)){
            if(!empty(\Yii::$app->params['quote']['deductible_factors'][$this->deductible])){
                return \Yii::$app->params['quote']['deductible_factors'][$this->deductible][1];
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    public function getComputerCoveragePremium(){
        return round(($this->getComputerCoverageLimit()/1000)*$this->getComputerCoverageRate()*$this->getComputerCoverageDeductible(),0);
    }


	public function getScheduledComputerCoveragePremium(){

	}
    /**
     * ----------------------------------------computer coverage-------------------------------------
     */


    /**
     * -------------------------------------cooking protection-------------------------------------------
     */
    public function getCookingProtectionApplies(){
        if(!empty($this->cooking_protection_equip)){
            return true;
        } else {
            return false;
        }
    }

    public function getCookingProtectionInitialPremium(){
        if(!empty($this->cooking_protection_equip)){
            return \Yii::$app->params['quote']['cooking_protection_equip'];
        } else {
            return 0;
        }
    }

    public function getCookingProtectionInitialDeductible(){
        return $this->getDeductibleFactorBP();
    }

    public function  getCookingProtectionPremium(){
        return round($this->getCookingProtectionInitialPremium()*$this->getCookingProtectionInitialDeductible(),0);
    }
    // ----------------------------------cooking protection----------------------------------------------------


    /**
     * ---------------------------------Customers Goods--------------------------------------------------------
     */
    public function getCustomersGoodsLimit(){
        return !empty($this->customers_goods)?$this->customers_goods:0;
    }
    public function getCustomersGoodsRate(){
        return $this->getTableRateBP();
    }
    public function getCustomersGoodsDeductible(){
        return $this->getDeductibleFactorBP();
    }
    public function getCustomersGoodsPremium(){
        return round($this->getCustomersGoodsLimit()/100*$this->getCustomersGoodsRate()*$this->getCustomersGoodsDeductible(),0);
    }
    /**
     * ---------------------------------Customers Goods--------------------------------------------------------
     */


    /**
     * ----------------------------------------demolition debris-----------------------------------------------
     */
    public function getDDAggr_1_rate(){
        if(!empty($this->agreement_one)){
            return \Yii::$app->params['quote']['demolition_debris']['aggr1']+1;
        } else {
            return 0;
        }
    }
    public function getDDAggr_2_rate(){
        if(!empty($this->agreement_two)){
            return \Yii::$app->params['quote']['demolition_debris']['aggr2'];
        } else {
            return 0;
        }
    }
    public function getDDAggr_3_rate(){
        if(!empty($this->agreement_three)){
            return \Yii::$app->params['quote']['demolition_debris']['aggr3'];
        } else {
            return 0;
        }
    }
    public function getDDDeductible(){
        return $this->getDeductibleFactorBuilding();
    }
    public function getDDBldgRate(){
        return $this->getTableRateBuilding();
    }
    public function getDDAggr_1_premium(){
        return round(($this->agreement_one/100)*$this->getDDBldgRate()*$this->getDDAggr_1_rate()*$this->getDDDeductible(),0);
    }
    public function getDDAggr_2_premium(){
        return round(($this->agreement_two/100)*$this->getDDAggr_2_rate()*$this->getDDDeductible(),0);
    }
    public function getDDAggr_3_premium(){
        return round(($this->agreement_three/100)*$this->getDDAggr_3_rate()*$this->getDDDeductible(),0);
    }

    public function getDemolitionDebrisLimit(){
        return array_sum([$this->agreement_one,$this->agreement_two,$this->agreement_three]);
    }
    public function getDemolitionDebrisPremium(){
        return array_sum([$this->getDDAggr_1_premium(),$this->getDDAggr_2_premium(),$this->getDDAggr_3_premium()]);
    }
    /**
     * ----------------------------------------demolition debris-----------------------------------------------
     */


	/**
	 * ----------------------------------------demolition Coverage---------------------------------------------
	 */


	public function getDemolitionCoverage(){
		return round(($this->agreement_one/100)*$this->getDDBldgRate()*$this->getDDAggr_1_rate()*$this->getDDDeductible(),0);
	}

	/**
	 * ----------------------------------------demolition Coverage---------------------------------------------
	 */

    /*
     * ---------------------------------------Earthquake Coverage----------------------------------------------
     */

    public function getEBuildingLimit(){
        return $this->building_limit?$this->building_limit:0;
    }
    public function getEBPLimit(){
        return $this->bus_prop_limit?$this->bus_prop_limit:0;
    }

    public function getCR3(){
        if(in_array($this->quote->construction,[2,3])){
            return $this->quote->construction;
        } else {
            if($this->masonry_veneer==1){
                return 2;
            } else {
                return 1;
            }
        }
    }

    public function getEBuildingRate(){
        if($this->quote->countryModel){
            return \Yii::$app->excel->vlookup($this->getCR3(),\Yii::$app->params['quote']['building_zone'],$this->quote->countryModel->eq_zone-1,0);
        } else {
            return 0;
        }
    }
    public function getEBPRate(){
        if($this->quote->countryModel){
            return \Yii::$app->excel->vlookup($this->getCR3(),\Yii::$app->params['quote']['bp_zone'],$this->quote->countryModel->eq_zone-1,0);
        } else {
            return 0;
        }
    }

    public function getEBuildingPremium(){
        return round(($this->getEBuildingLimit()/100)*$this->getEBuildingRate()*$this->getDeductibleFactorBuilding()*\Yii::$app->params['quote']['earthquake_factor']);
    }

    public function getEBPPremium(){
        return round(($this->getEBPLimit()/100)*$this->getEBPRate()*$this->getDeductibleFactorBP()*\Yii::$app->params['quote']['earthquake_factor']);
    }

    public function getEarthquakeCoverageLimit(){
        return $this->getEBuildingLimit()+$this->getEBPLimit();
    }
    public function getEarthquakeCoveragePremium(){
        return $this->getEBuildingPremium()+$this->getEBPPremium();
    }
    /*
     * ---------------------------------------Earthquake Coverage----------------------------------------------
     */


    /**
     * -------------------------------------Employee Dishonesty=---------------------------------------------
     */
    public function  getEmployeeAdditional(){
        return $this->employee_dishonesty?$this->employee_dishonesty:0;
    }
    public function  getEmployeeRate(){
        return \Yii::$app->params['quote']['employee_dishonesty'];
    }
    public function getEmployeePremium(){
        return round(($this->getEmployeeAdditional()/1000)*$this->getEmployeeRate());
    }
    /**
     * -------------------------------------Employee Dishonesty=---------------------------------------------
     */


    /**
     * ----------------------------------Equipment Breakdown-------------------------------------------------
     */

    public function getCovAB(){
        return $this->quote->building_amount_of_ins+$this->quote->bus_amount_of_ins;
    }
    public function getEquipmentBreakdownPremium(){
        if(!empty($this->equipment_breakdown)){
            return $this->getEquipmentBreakdownPremiumSum();
        } else {
            return 0;
        }
    }
    public function getEquipmentBreakdownPremiumSum(){
        $sum = 0;
        $bk25 = $this->getCovAB();
        foreach(\Yii::$app->params['quote']['equipment_breakdown'] as $key=>$value){
            $sum+=$this->getEquipmentBreakdownPremiumSumElement($key,$bk25);
        }
        return $sum;
    }
    public function getEquipmentBreakdownPremiumSumElement($i,$bk25){
        switch($i){
            case '50.000 and Less':
                if($bk25>0&&$bk25<50001){
                    return \Yii::$app->params['quote']['equipment_breakdown'][$i];
                }
                break;
            case '$50.001 to $100.000':
                if($bk25>50000&&$bk25<100001){
                    return \Yii::$app->params['quote']['equipment_breakdown'][$i];
                }
                break;
            case '$100.001 to $150.000':
                if($bk25>100000&&$bk25<150001){
                    return \Yii::$app->params['quote']['equipment_breakdown'][$i];
                }
                break;
            case '$150.001 to $200.000':
                if($bk25>150000&&$bk25<200001){
                    return \Yii::$app->params['quote']['equipment_breakdown'][$i];
                }
                break;
            case '$200.001 to $250.000':
                if($bk25>200000&&$bk25<250001){
                    return \Yii::$app->params['quote']['equipment_breakdown'][$i];
                }
                break;
            case '250.001 to $300.000':
                if($bk25>250000&&$bk25<300001){
                    return \Yii::$app->params['quote']['equipment_breakdown'][$i];
                }
                break;
            case '$300.001 to $400.000':
                if($bk25>300000&&$bk25<400001){
                    return \Yii::$app->params['quote']['equipment_breakdown'][$i];
                }
                break;
            case '$400.001 to $500.000':
                if($bk25>400000&&$bk25<500001){
                    return \Yii::$app->params['quote']['equipment_breakdown'][$i];
                }
                break;
            case 'Greater than $500.000':
                if($bk25>500000){
                    return \Yii::$app->params['quote']['equipment_breakdown'][$i];
                }
                break;
        }
    }
    /**
     * ----------------------------------Equipment Breakdown-------------------------------------------------
     */


    /**
     * -----------------------------------Exterior Signs-----------------------------------------------------
     */
    public function getExteriorSignsAdditional(){
        return $this->exterior_signs;
    }
    public function getExteriorSignsRate(){
        return \Yii::$app->params['quote']['exterior_signs_rate'];
    }
    public function getExteriorSignsDeductible(){
        return $this->getDeductibleFactorBP();
    }
    public function getExteriorSignsPremium(){
        return round(($this->getExteriorSignsAdditional()/100)*$this->getExteriorSignsRate()*$this->getExteriorSignsDeductible(),0);
    }
    /**
     * -----------------------------------Exterior Signs-----------------------------------------------------
     */


    /**
     * -----------------------------------Loss of Income (additional months)-----------------------------------------------------
     */

    public function getDE5(){
        return $this->loss_off_income_month;
    }
    public function getLoss_off_IncomeMonthFactor(){
        return \Yii::$app->params['quote']['loss_off_income_month_factor'];
    }
    //building
    public function getLoss_off_IncomeAF24(){
        return $this->quote->getBldgComposite();
    }
    //bp
    public function getLoss_off_IncomeAF25(){
        return $this->quote->getBPComposite();
    }

    public function getLoss_off_IncomeMonthBuildingPremium(){
        return round($this->getDE5()*$this->getLoss_off_IncomeMonthFactor()*$this->getLoss_off_IncomeAF24(),0);
    }
    public function getLoss_off_IncomeMonthBPPremium(){
        return round($this->getDE5()*$this->getLoss_off_IncomeMonthFactor()*$this->getLoss_off_IncomeAF25(),0);
    }

    public function getLoss_off_IncomeMonthPremium(){
        return $this->getLoss_off_IncomeMonthBuildingPremium()+$this->getLoss_off_IncomeMonthBPPremium();
    }
    /**
     * -----------------------------------Loss of Income (additional months)-----------------------------------------------------
     */


    /**
     * -----------------------------------Loss of Income (SF-312)-----------------------------------------------------
     */
    public function Loss_of_IncomeAdditional(){
        if(!empty($this->loss_of_income)){
            return 1;
        }
        return 0;
    }
    public function Loss_of_IncomeFactor(){
        if($this->Loss_of_IncomeAdditional()==1){
            return \Yii::$app->params['quote']['loss_off_income_factor'];
        } else {
            return 0;
        }
    }
    public function getLoss_off_IncomeBuildingPremium(){
        return round($this->Loss_of_IncomeFactor()*$this->getLoss_off_IncomeAF24(),0);
    }
    public function getLoss_off_IncomeBPPremium(){
        return round($this->Loss_of_IncomeFactor()*$this->getLoss_off_IncomeAF25(),0);
    }

    public function getLoss_off_IncomePremium(){
        return $this->getLoss_off_IncomeBuildingPremium()+$this->getLoss_off_IncomeBPPremium();
    }
    /**
     * -----------------------------------Loss of Income (SF-312)-----------------------------------------------------
     */


    /**
     * -----------------------------------Loss of Income (SF-312A)-----------------------------------------------------
     */

    public function Loss_of_IncomeAAdditional(){
        if(!empty($this->loss_of_income_sf)){
            return 1;
        }
        return 0;
    }
    public function Loss_of_IncomeAFactor(){
        if($this->Loss_of_IncomeAAdditional()==1){
            return \Yii::$app->params['quote']['loss_off_income_a_factor'];
        } else {
            return 0;
        }
    }
    public function getLoss_off_IncomeABuildingPremium(){
        return round($this->Loss_of_IncomeAFactor()*$this->getLoss_off_IncomeAF24(),0);
    }
    public function getLoss_off_IncomeABPPremium(){
        return round($this->Loss_of_IncomeAFactor()*$this->getLoss_off_IncomeAF25(),0);
    }

    public function getLoss_off_IncomeAPremium(){
        return $this->getLoss_off_IncomeABuildingPremium()+$this->getLoss_off_IncomeABPPremium();
    }
    /**
     * add 10%
     */
    public function getNumberOf10Building(){
        return !empty($this->building_increment) ? $this->building_increment : 0;
    }
    public function getNumberOf10BP(){
        return !empty($this->bus_prop_increment) ? $this->bus_prop_increment : 0;
    }
    public function getNumberFactor(){
        return \Yii::$app->params['quote']['loss_off_income_a_number_factor'];
    }
    public function getNumberOf10BuildingPremium(){
        return round($this->getNumberOf10Building()*$this->getNumberFactor()*$this->getLoss_off_IncomeAF24(),0);
    }
    public function getNumberOf10BPPremium(){
        return round($this->getNumberOf10BP()*$this->getNumberFactor()*$this->getLoss_off_IncomeAF25(),0);
    }

    public function getNumberPremiumTotal(){
        return $this->getNumberOf10BuildingPremium()+$this->getNumberOf10BPPremium();
    }
    /**
     * @return float
     * Total value
     */
    public function getLoss_off_IncomeATotal(){
        return $this->getLoss_off_IncomeAPremium()+$this->getNumberPremiumTotal();
    }
    /**
     * -----------------------------------Loss of Income (SF-312A)-----------------------------------------------------
     */


    /**
     * ----------------------------------------------Loss Payable------------------------------------------------------
     */
    public function getLossPayableApply(){
        return !empty($this->loss_payable)?$this->loss_payable:0;
    }
    public function getLossPayablePremium(){
        return 0;
    }
    /**
     * ----------------------------------------------Money & Securities-------------------------------------------------
     */

    public function getMoneySecuritiesAmount(){
        return $this->money_securities;
    }

    public function getMoneySecuritiesRate(){
        //=IF(C2=2,DK4,IF(C2=3,DK6,IF(OR(D2=40,D2=44,D2=52,D2=30,D2=60),DK5,DK3)))
        if($this->quote->zone==2){
            return \Yii::$app->params['quote']['money_security_rate']['upstate_cities'];
        } else {
            if($this->quote->zone==3){
                return \Yii::$app->params['quote']['money_security_rate']['ny_city'];
            } else{
                if(in_array($this->quote->country,[40,44,52,30,60])){
                    return \Yii::$app->params['quote']['money_security_rate']['suburban'];
                } else {
                    return \Yii::$app->params['quote']['money_security_rate']['upstate'];
                }
            }
        }
    }
    public function getMoneySecuritiesDeductible(){
        return $this->getDeductibleFactorBP();
    }
    public function getMoneySecuritiesPremium(){
        return round(($this->getMoneySecuritiesAmount()/1000)*$this->getMoneySecuritiesRate()*$this->getMoneySecuritiesDeductible(),0);
    }

    /**
     * ---------------------------------------------Money & Securities--------------------------------------------------
     */



    /**
     * ---------------------------------------------Off Premises Power - Direct Damages---------------------------------
     */

    public function getDirectDamagesLines(){
        return \Yii::$app->quote->getValueByAttribute($this,'damages_transmission_lines');
    }
    public function getDirectDamagesAmount(){
        return !empty($this->direct_damages) ? $this->direct_damages : 0;
    }
    public function getDirectDamagesRate(){
        $limit = $this->getDirectDamagesAmount();
        if($limit>3){
            if($this->damages_transmission_lines==1){
                return \Yii::$app->params['quote']['direct_damage_rate']['excluding'];
            } else {
                return \Yii::$app->params['quote']['direct_damage_rate']['including'];
            }
        } else {
            return 0;
        }
    }
    public function getDirectDamagesDeductible(){
//=IF(AND(HU12<>"",HU12<>0,HU12<>8),VLOOKUP($'List Sheet'.HU12,$'List Sheet'.$AL$3:$AN$9,3,FALSE()),0)
        if(!empty($this->damages_deductible)){
            return \Yii::$app->excel->vlookup($this->damages_deductible,\Yii::$app->params['quote']['deductible_factors'],1,0);
        } else {
            return 0;
        }
    }
    public function getDirectDamagesPremium(){
        return round(($this->getDirectDamagesAmount()/100)*$this->getDirectDamagesRate()*$this->getDirectDamagesDeductible(),0);
    }
    /**
     * ---------------------------------------------Off Premises Power - Direct Damages---------------------------------
     */


    /**
     * ---------------------------------------------Off Premises Power - Time element---------------------------------
     */

    public function getTimeElementLines(){
        return \Yii::$app->quote->getValueByAttribute($this,'time_transmission_lines');
    }
    public function getTimeElementAmount(){
        return !empty($this->time_element)?$this->time_element:0;
    }
    public function getTimeElementRate(){
        $limit = $this->getTimeElementAmount();

        if($limit>3){
            if($this->time_transmission_lines==1){
                return \Yii::$app->params['quote']['time_element_rate']['excluding'];
            } else {
                return \Yii::$app->params['quote']['time_element_rate']['including'];
            }
        } else {
            return 0;
        }
    }
    public function getTimeElementDeductible(){
//=IF(AND(HV12<>"",HV12<>0,HV12<>8),VLOOKUP($'List Sheet'.HV12,$'List Sheet'.$AL$3:$AN$9,3,FALSE()),0)
        if(!empty($this->time_deductible)){
            return \Yii::$app->excel->vlookup($this->time_deductible,\Yii::$app->params['quote']['deductible_factors'],1,0);
        } else {
            return 0;
        }
    }
    public function getTimeElementPremium(){
        return round(($this->getTimeElementAmount()/100)*$this->getTimeElementRate()*$this->getTimeElementDeductible(),0);
    }
    /**
     * ---------------------------------------------Off Premises Power - Time Element---------------------------------
     */



    public function getInsuredPremisesAPremium()
    {
        return round($this->getInsuredPremisesANo() * $this-> getInsuredPremisesARate() * $this->getInsuredPremisesABPPrem(), 0);
    }

    public function getInsuredPremisesANo()
    {
        // =IF(AND(EI6<>"";EI6<>11;EI6<>0);EI6;0)
        return !empty($this->insured_premises_a_ten) ? $this->insured_premises_a_ten : 0;
    }

    public function getInsuredPremisesARate()
    {
        return \Yii::$app->params['quote']['insured_premises_a_rate'];
    }

    public function getInsuredPremisesABPPrem()
    {
        return $this->quote->getBPComposite();
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getInsuredPremisesPremium()
    {
        return round($this->getInsuredPremisesNo() * $this-> getInsuredPremisesRate() * $this->getInsuredPremisesBPPrem(), 0);
    }

    public function getInsuredPremisesNo()
    {
        // =IF(AND(EF6<>"";EF6<>11;EF6<>0);EF6;0)
        return !empty($this->insured_premises_ten) ? $this->insured_premises_ten : 0;
    }

    public function getInsuredPremisesRate()
    {
        return \Yii::$app->params['quote']['insured_premises_rate'];
    }

    public function getInsuredPremisesBPPrem()
    {
        return $this->quote->getBPComposite();
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getValuablePapersPremium()
    {
        return round(($this->valuable_papers / 1000) * $this->getValuablePapersRate() * $this->getValuablePapersDed(), 0);
    }

    public function getValuablePapersRate() {
        return \Yii::$app->params['quote']['valuable_papers_rate'];
    }

    public function getValuablePapersDed() {
        return $this->quote->getDeductibleFactorBP();
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getTenantImprovementsAPremium()
    {
        return round($this->getTenantImprovementsAXZ1() * $this->getTenantImprovementsAAgg(), 0);
    }

    public function getTenantImprovementsAAgg()
    {
        return $this->quote->getAggregateFactor();
    }

    public function getTenantImprovementsAXZ1()
    {
        return round($this->getTenantImprovementsAXZ2() * $this->getTenantImprovementsASpecialCond(), 4);
    }

    public function getTenantImprovementsAXZ2() {
        return round($this->getTenantImprovementsAXZ3() * $this->getTenantImprovementsADrCr(), 4);
    }

    public function getTenantImprovementsASpecialCond()
    {
        return $this->quote->getSpecialConditionsBuilding();
    }

    public function getTenantImprovementsAXZ3()
    {
        return round($this->getTenantImprovementsAXZ4() * $this->getTenantImprovementsADed(), 4);
    }

    public function getTenantImprovementsADrCr()
    {
        return $this->quote->getBuildingCredits();
    }

    public function getTenantImprovementsAXZ4()
    {
        return round(($this->getTenantImprovementsAXZ5() / 100) * $this->tenant_Improvements_a, 4);
    }

    public function getTenantImprovementsADed()
    {
        return $this->quote->getDeductibleFactorBuilding();
    }

    public function getTenantImprovementsAXZ5()
    {
        return round($this->getTenantImprovementsAXZ6() * $this->getTenantImprovementsALead(), 4);
    }

    public function getTenantImprovementsAXZ6()
    {
        return round($this->getTenantImprovementsTableARate() * $this->getTenantImprovementsAZone(), 4);
    }

    public function getTenantImprovementsALead()
    {
        return $this->quote->getLeadFactor();
    }

    public function getTenantImprovementsTableARate()
    {
        return isset(\Yii::$app->params['quote']['rate_table'][$this->getTenantImprovementsCombinationCode()]) ? \Yii::$app->params['quote']['rate_table'][$this->getTenantImprovementsCombinationCode()][$this->quote->getRateTableKey()] : null;
    }

    public function getTenantImprovementsAZone()
    {
        return $this->quote->getBuildingZoneFactor();
    }

    public function getTenantImprovementsCombinationCode()
    {
        // =CONCATENATE($'List Sheet'.O2;$'List Sheet'.C2;A2;2;A7;$'List Sheet'.G2;A6;A5)

        $quote = $this->quote;

        $construction = $quote->construction == 3 ? 2 : $quote->construction; // A2
        $quote_occupancy_mer_serc1 = $quote->occupancy->mer_serc > 5 ? 9 : 1; // A7
        $quote_occupancy_mer_serc2 = $quote->occupancy->mer_serc > 5 ? ($quote->occupancy->mer_serc == 8 ? $quote->occupied_type : 9) : $quote->occupied_type; // A6
        $quote_occupancy_mer_serc3 = $quote->occupancy->mer_serc == 1 ? $quote->occupancy->bldg_rg : 9; //A5

        return \Yii::$app->excel->concat([
            $quote->prior_since,
            $quote->zone,
            $construction,
            2,
            $quote_occupancy_mer_serc1,
            $quote->occupancy->mer_serc,
            $quote_occupancy_mer_serc2,
            $quote_occupancy_mer_serc3
        ]);
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getTenantImprovementsPremium()
    {
        return round($this->getTenantImprovementsXZ1() * $this->getTenantImprovementsAAgg(), 0);
    }

    public function getTenantImprovementsXZ1()
    {
        return round($this->getTenantImprovementsXZ2() * $this->getTenantImprovementsASpecialCond(), 4);
    }

    public function getTenantImprovementsXZ2() {
        return round($this->getTenantImprovementsXZ3() * $this->getTenantImprovementsADrCr(), 4);
    }

    public function getTenantImprovementsXZ3()
    {
        return round($this->getTenantImprovementsXZ4() * $this->getTenantImprovementsADed(), 4);
    }

    public function getTenantImprovementsXZ4()
    {
        return round(($this->getTenantImprovementsXZ5() / 100) * $this->tenant_Improvements_one, 4);
    }

    public function getTenantImprovementsXZ5()
    {
        return round($this->getTenantImprovementsXZ6() * $this->getTenantImprovementsALead(), 4);
    }

    public function getTenantImprovementsXZ6()
    {
        return round($this->getTenantImprovementsTableARate() * $this->getTenantImprovementsAZone(), 4);
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getStorekeepersBurglaryRobberyTotalPremium()
    {
        return $this->getStorekeepersBurglaryRobberyPremium() + $this->getBurglaryOfMoneyPremium() + $this->getTheftOfMoneyPremium();
    }

    public function getStorekeepersBurglaryRobberyPremium()
    {
        return round($this->getStorekeepersBurglaryRobberyPrePremium() * $this->getStorekeepersBurglaryRobberyTerrMult() * $this->getStorekeepersBurglaryRobberySDed(), 0);
    }

    public function getBurglaryOfMoneyPremium()
    {
        return round($this->burglary_of_money / 100 * $this->getBurglaryOfMoneyRate() * $this->getStorekeepersBurglaryRobberyTerrMult() * $this->getStorekeepersBurglaryRobberySDed(), 0);
    }

    public function getTheftOfMoneyPremium()
    {
        return round($this->theft_of_money / 100 * $this->getTheftOfMoneyRate() * $this->getStorekeepersBurglaryRobberyTerrMult() * $this->getStorekeepersBurglaryRobberySDed(), 0);
    }

    public function getStorekeepersBurglaryRobberyPrePremium()
    {
        // =IF(AND(DY3<>"";DY3<>0);VLOOKUP(OFFSET(DY3;DY3;0);DY4:EC11;DZ13+1;FALSE());0)
        if($this->storekeepers_burglary_robbery) {
            return \Yii::$app->params['quote']['crime_rate_groups'][$this->storekeepers_burglary_robbery][$this->quote->occupancy->crime_group];
        } else {
            return 0;
        }
    }

    public function getStorekeepersBurglaryRobberyTerrMult()
    {
        // =IF($'List Sheet'.C2=3;EA16;IF(OR(D2=30;D2=40;D2=44;D2=52;D2=60);EA15;EA17))
        if($this->quote->zone == 3) {
            return \Yii::$app->params['quote']['terr_mult_nyc'];
        } else {
            if($this->quote->country == 30
                || $this->quote->country == 40
                || $this->quote->country == 44
                || $this->quote->country == 52
                || $this->quote->country == 60) {
                return \Yii::$app->params['quote']['terr_mult_sub'];
            } else {
                return \Yii::$app->params['quote']['terr_mult_remainder'];
            }
        }
    }

    public function getStorekeepersBurglaryRobberySDed()
    {
        // =IF(AND(EA27<>"";EA27<>0;EA27<>8);VLOOKUP($'List Sheet'.$EA$27;$'List Sheet'.$AL$3:$AN$9;3;FALSE());1)
        if($this->storekeepers_burglary_robbery_deductible && $this->storekeepers_burglary_robbery_deductible != 8) {
            return \Yii::$app->params['quote']['deductible_factors'][$this->storekeepers_burglary_robbery_deductible][1];
        } else {
            return 1;
        }
    }

    public function getBurglaryOfMoneyRate()
    {
        return \Yii::$app->params['quote']['burg_of_money'];
    }

    public function getTheftOfMoneyRate()
    {
        return \Yii::$app->params['quote']['theft_of_money'];
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getSprinklerLeakagePremium()
    {
        return $this->getSprinklerLeakagePrePremium() + $this->getSprinklerLeakageTenPrePremium();
    }

    public function getSprinklerLeakagePrePremium()
    {
        return round($this->getSprinklerLeakageRate() * $this->getSprinklerLeakageBPPrem(), 0);
    }

    public function getSprinklerLeakageTenPrePremium()
    {
        return round($this->getSprinklerLeakageTenRate() * $this->getSprinklerLeakageTenBPPrem() * $this->getSprinklerLeakageTenAdditional(), 0);
    }

    public function getSprinklerLeakageRate()
    {
        if($this->quote->policy_type == 1 && $this->sprinkler_leakage) {
            return \Yii::$app->params['quote']['sprink_leak'];
        } else {
            return 0;
        }
    }

    public function getSprinklerLeakageBPPrem()
    {
        return $this->quote->getBPComposite();
    }

    public function getSprinklerLeakageTenRate()
    {
        return \Yii::$app->params['quote']['sprink_leak_rate_increase'];
    }

    public function getSprinklerLeakageTenBPPrem()
    {
        return $this->quote->getBPComposite();
    }

    public function getSprinklerLeakageTenAdditional()
    {
        return ($this->add_increment && $this->add_increment != 11) ? $this->add_increment : 0;
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getSeasonVariationPremium()
    {
        return $this->getSeasonVariationToAddCoveragePremium() + $this->getSeasonVariationToIncreaseMonthsPremium() + $this->getSeasonVariationToIncreasePercentagePremium();
    }

    public function getSeasonVariationToAddCoveragePremium()
    {
        return round($this->getSeasonVariationToAddCoverageRate() * $this->getSeasonVariationBPPrem(), 0);
    }

    public function getSeasonVariationToIncreaseMonthsPremium()
    {
        return round($this->add_mos * $this->getSeasonVariationToIncreaseMonthsRate() * $this->getSeasonVariationBPPrem(), 0);
    }

    public function getSeasonVariationToIncreasePercentagePremium()
    {
        return round($this->number_of_additional * $this->getSeasonVariationToIncreasePercentageRate() * $this->getSeasonVariationBPPrem(), 0);
    }

    public function getSeasonVariationBPPrem()
    {
        return $this->quote->getBPComposite();
    }

    public function getSeasonVariationToAddCoverageRate()
    {
        if($this->season_variation) {
            if($this->quote->policy_type == 1) {
                return \Yii::$app->params['quote']['seasonal_var_rate']['standard'];
            } else {
                return \Yii::$app->params['quote']['seasonal_var_rate']['deluxe'];
            }
        } else {
            return 0;
        }
    }

    public function getSeasonVariationToIncreaseMonthsRate()
    {
        if($this->add_mos > 0) {
            return \Yii::$app->params['quote']['seasonal_var_additional_month'];
        } else {
            return 0;
        }
    }

    public function getSeasonVariationToIncreasePercentageRate()
    {
        if($this->number_of_additional > 0) {
            return \Yii::$app->params['quote']['seasonal_var_additional_percent'];
        } else {
            return 0;
        }
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getRefrigeratedPropertyPremium()
    {
        return round(($this->refrigerated_property / 1000) * $this->getRefrigeratedPropertyRate() * $this->getRefrigeratedPropertyDed(), 0);
    }

    public function getRefrigeratedPropertyRate()
    {
        return \Yii::$app->params['quote']['refrigerated_property_rate'];
    }

    public function getRefrigeratedPropertyDed()
    {
        // =IF(AND(HX5<>"";HX5<>0;HX5<>8);VLOOKUP($'List Sheet'.HX5;$'List Sheet'.$AL$3:$AN$9;3;FALSE());0)
        if($this->refrigerated_property_deductible) {
            return \Yii::$app->params['quote']['deductible_factors'][$this->refrigerated_property_deductible][1];
        } else {
            return 0;
        }
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getRefrigeratedFoodPremium()
    {
        return round(($this->refrigerated_food / 1000) * $this->getRefrigeratedFoodRate() * $this->getRefrigeratedFoodDed(), 0);
    }

    public function getRefrigeratedFoodRate()
    {
        return \Yii::$app->params['quote']['refrigerated_food_rate'];
    }

    public function getRefrigeratedFoodDed()
    {
        // =IF(AND(DS5<>"";DS5<>0;DS5<>8);VLOOKUP($'List Sheet'.$DS$5;$'List Sheet'.$AL$3:$AN$9;3;FALSE());0)
        if($this->food_deductible) {
            return \Yii::$app->params['quote']['deductible_factors'][$this->food_deductible][1];
        } else {
            return 0;
        }
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getBuildingGlassPremium()
    {
        return $this->getBuildingGlassPrePremium() + $this->getBuildingGlassLitteringPremium();
    }

    public function getBuildingGlassPrePremium()
    {
        return round($this->building_glass * $this->getBuildingGlassAlarm() * $this->getBuildingGlassRate() * $this->getBuildingGlassCurved(), 0);
    }

    public function getBuildingGlassAlarm()
    {
        if($this->plates) {
            return \Yii::$app->params['quote']['outside_glass']['alarm'] + 1;
        } else {
            return 1;
        }
    }

    public function getBuildingGlassRate()
    {
        // =IF(C2=3;DP9;DP8)
        if($this->quote->zone == 3) {
            return \Yii::$app->params['quote']['outside_glass_linear_feet_rates']['ny_city'];
        } else {
            return \Yii::$app->params['quote']['outside_glass_linear_feet_rates']['others'];
        }
    }

    public function getBuildingGlassCurved()
    {
        if($this->curved) {
            return \Yii::$app->params['quote']['outside_glass']['curved'];
        } else {
            return 1;
        }
    }

    public function getBuildingGlassLitteringPremium()
    {
        return round($this->ornamental_work / 100 * $this->getBuildingGlassLitteringRate(), 0);
    }

    public function getBuildingGlassLitteringRate()
    {
        return \Yii::$app->params['quote']['outside_glass']['lettering'];
    }

    // -----------------------------------------------------------------------------------------------------------------

    public function getOrdinanceAndLawPremium()
    {
        return round($this->getOrdinanceAndLawTotal() / 100 * $this->getOrdinanceAndLawBldgRate() * $this->getOrdinanceAndLawRate(), 0);
    }

    public function getOrdinanceAndLawTotal()
    {
        return $this->demolition_amount + $this->increased_cost;
    }

    public function getOrdinanceAndLawBldgRate()
    {
        return $this->quote->getTableRateBuilding();
    }

    public function getOrdinanceAndLawRate()
    {
        return \Yii::$app->params['quote']['ordinance_and_law_rate'];
    }

    // -----------------------------------------------------------------------------------------------------------------

	public function getBusinessExtender(){
		if(!empty($this->sf_500)){
			return 182*count($this->quote->selectedLocations);
		}
		return 0;
	}

	public function getBopExtenderEndorsement(){
		if(!empty($this->sf_519)){
			$locations = [
				'Bagel Shop - with cooking',
				'Bakeries - with cooking and selling',
				'Bar',
				'Candy, Nut and Confectionery Store-Cooking',
				'Deli with Fryers and Grills',
				'Pizza Shop - with cooking',
				'Mini Mart',
				'Restaurant '
			];
			$counter = 0;
			foreach($this->quote->selectedLocations as $location){
				if(in_array($location->name,$locations)) $counter++;
			}
			return 121*$counter;
		}
			return 0;
	}

	public function getBopExtenderEndorsements(){
		$number = count($this->quote->selectedLocations);
		return ($this->getSf513()+$this->getSf514()+$this->getSf515())*$number;
	}
	public function getSf513(){
		if($this->sf_513_value){
			return 50;
		}
		return 0;
	}
	public function getSf514(){
		if($this->sf_513_value){
			return 90;
		}
		return 0;
	}
	public function getSf515(){
		if($this->sf_513_value){
			return 125;
		}
		return 0;
	}

	public  function getHotelMotelExtender(){
		$counter = 0;
		foreach($this->quote->selectedLocations as $location){
			if($location->id == 3) $counter++;
		}
		return 75*$counter;
	}

	public function getIncreasedCostOfConstruction(){
		return ($this->increased_cost/100)*0.8*$this->quote->getBldgComposite();
	}

	public function getCilicaExclusion(){
		$number = count($this->quote->selectedLocations);
		return $number*(-1);
	}

	public function getAdditionalInsuredVendors() {

	}

	/**
	 * sf349
	 */
	public function optionalTimeDeductible(){
		if($this->sf_349_value){
			return 1;
		} else {
			return 0;
		}
	}

	public function getRestaurantHoodAndDuctProtectionSf32(){
		$locations = [
			'Bagel shop with cooking','Bakeries with cooking and selling on premise',
			'Bar','Candy, Nut and Confectionery store with cooking on premise',
			'Deli with Fryers and Grills','Pizza Shop with cooking','Mini Mart with cooking',
			'Restaurants'
		];
		if(in_array($this->quote->occupancy->name,$locations)){
			return true;
		}
		return false;
	}


} 