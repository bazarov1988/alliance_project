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
     * @param $deductibleBP
     * @return float|int
     * get account receivable
     */
    public function getAccountsReceivable($deductibleBP){
        if(!empty($deductibleBP)&&$deductibleBP!=8){
            $deductibleBP = Yii::$app->excel->vlookup($deductibleBP,Yii::$app->params['quote']['deductible_factors'],3,true);
            return round(($this->accounts_receivable/1000)*$deductibleBP*5,0);
        } else {
            return 0;
        }
    }


    public function getAdditionalExpense(){
        return round(($this->additional_expense/1000)*3,0);
    }


    /**
     * @param $deductibleBldg
     * @return float|int
     * check it
     */
    public function bopExtenderEnd($deductibleBldg){
        if(!empty($deductibleBP)&&$deductibleBP!=8){
            $deductibleBP = Yii::$app->excel->vlookup($deductibleBP,Yii::$app->params['quote']['deductible_factors'],3,true);
            return round(0*$deductibleBP);
        } else {
            return 0;
        }
    }


    public function getBuildingInflationProtection($propDamage,$aggregate){
        $rate = (!empty($this->building_inflation_protection)&&!empty(Yii::$app->params['quote']['building_inflation'][$this->building_inflation_protection]))?Yii::$app->params['quote']['building_inflation'][$this->building_inflation_protection][1]:0;
        if($rate==0) return 0;

        if(!empty($propDamage)){
            $aggrFactor =     Yii::$app->excel->vlookup($propDamage,Yii::$app->params['quote']['aggregate_factors'],$aggregate+1,false);
            if($aggrFactor==0) return 0;


        } else {
            return 0;
        }

    }

} 