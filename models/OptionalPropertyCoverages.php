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
    /**
     * @param $deductibleBP
     * @return float|int
     * get account receivable
     */
    public function getAccountsReceivableDeductible(){
        return $this->quote->getDeductibleFactorBP();
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
     * BusinessownersBurglaryRobbery
     */
    public function getBusinessownersBurglaryRobberyDeductible(){
        return $this->quote->getDeductibleFactorBP();
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
    /**
     * Businessowners Burglary Robbery premium
     */


    /**
     * @return mixed
     * cause of loss methods
     */
    public function getCauseOfLossBuildingLimit(){
        return $this->quote->building_amount_of_ins;
    }
    public function getCauseOfLossBPLimit(){
        return $this->quote->bus_amount_of_ins;
    }
    public function getCauseOfLossBuildingDeductible(){
        return $this->quote->getDeductibleFactorBuilding();
    }
    public function getCauseOfLossBPDeductible(){
        return $this->quote->getDeductibleFactorBP();
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
     * cause of loss methods
     */

    /**
     * compute coverage
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
     * computer coverage
     */

    // -----------------------------------------------------------------------------------------------------------------

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
} 