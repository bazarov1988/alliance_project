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
            return $this->deductible_bp;
        }
        return $this->deductible_bp;
    }


    public function getDeductibleFactorBuilding(){
        if(!$this->deductible_building){
            $this->deductible_building = $this->quote->getDeductibleFactorBuilding();
            return $this->deductible_building;
        }
        return $this->deductible_building;
    }

    public function getTableRateBP(){
        if(!$this->rate_bp){
            $this->rate_bp = $this->quote->getTableRateBP();
            return $this->rate_bp;
        }
        return $this->rate_bp;
    }


    public function getTableRateBuilding(){
        if(!$this->rate_building){
            $this->rate_building = $this->quote->getTableRateBuilding();
            return $this->rate_building;
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
            return round(($this->accounts_receivable/1000)*$deductibleBP*\Yii::$app->params['quote']['option_coverage_rates']['accounts'],0);
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
     * get Building Inflation Protection premium
     */
    public function getBuildingInflationProtectionRate(){
        return (!empty($this->building_inflation_protection)&&!empty(\Yii::$app->params['quote']['building_inflation'][$this->building_inflation_protection]))?\Yii::$app->params['quote']['building_inflation'][$this->building_inflation_protection][1]:0;
    }
    public function getBuildingInflationProtection(){
        $quote = $this->quote;
        $rate = $this->getBuildingInflationProtectionRate();
        if($rate==0) return 0;
        $bldgPremium = $quote->getBldgComposite();
        if($bldgPremium==0) return 0;
        return round($rate*$bldgPremium,0);
    }


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
        return $this->quote->building_amount_of_ins;
    }
    public function getCauseOfLossBPLimit(){
        return $this->quote->bus_amount_of_ins;
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
            $rate = \Yii::$app->params['quote']['building_cause_loss'][$this->cause_of_loss_building-1][2];
        }
        return round(($limit/100)*$deductible*$rate,0);
    }
    public function getCauseOfLossBPPremium(){
        $limit = $this->getCauseOfLossBPLimit();
        $deductible = $this->getCauseOfLossBPDeductible();
        $rate = 0;
        if(!empty($this->cause_of_loss_business_property)){
            $rate = \Yii::$app->params['quote']['business_property_cause_loss'][$this->cause_of_loss_business_property-1][2];
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
        return $this->computer_coverage;
    }
    public function getComputerCoverageRate(){
        return \Yii::$app->params['quote']['computer_coverage_rate'];
    }
    public function getComputerCoverageDeductible(){
    //=IF(AND(CI4<>"",CI4<>8,CI4<>0),VLOOKUP($'List Sheet'.$CI$4,$'List Sheet'.$AL$3:$AN$9,3,FALSE()),0)
        if(!empty($this->deductible)){
            if(!empty(\Yii::$app->params['quote']['deductible_factors'][$this->deductible-1])){
                return \Yii::$app->params['quote']['deductible_factors'][$this->deductible-1];
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

    public function  getCookingProtectionLimit(){
        return round($this->getCookingProtectionInitialPremium()*$this->getCookingProtectionInitialDeductible(),0);
    }
    // ----------------------------------cooking protection----------------------------------------------------


    /**
     * ---------------------------------Customers Goods--------------------------------------------------------
     */
    public function getCustomersGoodsLimit(){
        return $this->customers_goods;
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
        return round(($this->agreement_two/100)*$this->getDDBldgRate()*$this->getDDAggr_2_rate()*$this->getDDDeductible(),0);
    }
    public function getDDAggr_3_premium(){
        return round(($this->agreement_three/100)*$this->getDDBldgRate()*$this->getDDAggr_3_rate()*$this->getDDDeductible(),0);
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
            return \Yii::$app->exce->vlookup($this->getCR3(),\Yii::$app->params['quote']['building_zone'],$this->quote->countryModel->eq_zone-1,0);
        } else {
            return 0;
        }
    }
    public function getEBPRate(){
        if($this->quote->countryModel){
            return \Yii::$app->exce->vlookup($this->getCR3(),\Yii::$app->params['quote']['bp_zone'],$this->quote->countryModel->eq_zone-1,0);
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
                if($bk25>0&&$bk25<5001){
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
} 