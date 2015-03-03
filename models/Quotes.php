<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 27.02.15
 * Time: 18:53
 */
namespace app\models;
use app\models\_base\BaseQuotes;
use amnah\yii2\user\models\User;

class Quotes extends BaseQuotes{
    /**
     * @return \yii\db\ActiveQuery
     * relations
     */
    public function getPropertyCoverages(){
        return $this->hasOne(OptionalPropertyCoverages::className(),['quote_id'=>'id']);
    }
    public function getLiabilityCoverages(){
        return $this->hasOne(OptionalLiabilityCoverages::className(),['quote_id'=>'id']);
    }
    public function getSpecialConditions(){
        return $this->hasOne(SpecialConditions::className(),['quote_id'=>'id']);
    }
    public function getCountryModel(){
        return $this->hasOne(Countries::className(),['id'=>'country']);
    }
    public function getMedPayment(){
        return $this->hasOne(MedicalPayments::className(),['id'=>'med_payment']);
    }
    public function getOccupancy(){
        return $this->hasOne(Occupancy::className(),['id'=>'occupied']);
    }
    public function getUser(){
        return $this->hasOne(User::className(),['id'=>'user_id']);
    }


    /**
     * @return int
     * getter methods
     */
    public function getDeductibleFactorBuilding(){
        if(!empty($this->deductible_bldg)&&$this->deductible_bldg!=8){
            return Yii::$app->excel->vlookup($this->deductible_bldg,Yii::$app->params['quote']['deductible_factors'],3,true);
        } else {
            return 0;
        }
    }
    public function getDeductibleFactorBP(){
        if(!empty($this->deductible_bp)&&$this->deductible_bp!=8){
            return Yii::$app->excel->vlookup($this->deductible_bp,Yii::$app->params['quote']['deductible_factors'],3,true);
        } else {
            return 0;
        }
    }

    public function getBuildingAmountOfIns(){
        return (int)$this->building_amount_of_ins/100;
    }

    public function getBPAmountOfIns(){
        return (int)$this->bus_amount_of_ins/100;
    }

    public function getLeadFactor(){
        if($this->apt_in_bldg==2&&$this->sole_occupancy==1){
            if($this->occupied==97){
                return \Yii::$app->params['quote_params']['factor_credit']['restaurant'];
            } else {
                return \Yii::$app->params['quote_params']['factor_credit']['all_others'];
            }
        } else {
            return 1;
        }
    }
    public function getBuildingZoneFactor(){
        return \Yii::$app->excel->concat([1]);
    }
    public function getBPZoneFactor(){
        return \Yii::$app->exclel->concat([1]);
    }


}