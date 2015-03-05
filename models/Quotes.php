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
        $occup = $this->occupancy?$this->occupancy->mer_serc:0;
        $concat = (int)\Yii::$app->excel->concat([$occup,1]);
        if($concat>10){
            $z2 = ($this->zone==1?$this->countryModel->sub_zone:7)+1;
            return \Yii::$app->excel->vlookup($concat,\Yii::$app->params['quote']['zone_factors'],$z2,false);
        } else {
            return 0;
        }
    }
    public function getBPZoneFactor(){
        $occup = $this->occupancy?$this->occupancy->mer_serc:0;
        $concat= (int)\Yii::$app->exclel->concat([$occup,1]);
        if($concat>0){
            $z2 = ($this->zone==1?$this->countryModel->sub_zone:7)+1;
            return \Yii::$app->excel->vlookup($concat,\Yii::$app->params['quote']['zone_factors'],$z2,false);
        } else {
            return 0;
        }
    }

    public function getTableRatesBuilding(){}
    public function getTableRatesBP(){}


    public function getEnteredBuilding(){
//=CONCATENATE($'List Sheet'.O2,$'List Sheet'.C2,A2,$'List Sheet'.M2,A7,$'List Sheet'.G2,A6,A5)
        $o2 = !empty($this->prior_since)?$this->prior_since:0;
        $c2 = !empty($this->zone)?$this->zone:0;
        $a2 = '';
        if(!empty($this->construction)){
            $a2 = ($this->construction==3)?2:$this->construction;
        }
        $m2 = !empty($this->building_rc_acv)?$this->building_rc_acv:0;
        $g2 = $this->occupancy?$this->occupancy->mer_serc:0;
        $a7 = $g2>5?9:1;
        $k2 = !empty($this->occupied_type)?$this->occupied_type:0;
        $a6 = $g2>5?($g2==8?$k2:9):$k2;
        $a5 = $g2==1?($this->occupancy?$this->occupancy->bldg_rg:0):9;
        return \Yii::$app->excel->concat([$o2,$c2,$a2,$m2,$a7,$g2,$a6,$a5]);



    }

    public function getEnteredBP(){
//=CONCATENATE($'List Sheet'.O2,$'List Sheet'.C2,A2,$'List Sheet'.N2,B7,$'List Sheet'.G2,B6,B5)
    }
    protected function getRateTableKey()
    {
        // =IF($'List Sheet'.L2=1;IF($'List Sheet'.B2=1;2;IF($'List Sheet'.B2=2;3;IF($'List Sheet'.B2=3;4;IF($'List Sheet'.B2=4;4))));IF($'List Sheet'.B2=1;5;IF($'List Sheet'.B2=2;6;IF($'List Sheet'.B2=3;7;IF($'List Sheet'.B2=4;7)))))

        if($this->policy_type == 1) {
            if($this->protection == 1) {
                return 0;
            } else if($this->protection == 2) {
                return 1;
            } else if($this->protection == 3) {
                return 2;
            } else if($this->protection == 4) {
                return 2;
            }
        } else {
            if($this->protection == 1) {
                return 3;
            } else if($this->protection == 2) {
                return 4;
            } else if($this->protection == 3) {
                return 5;
            } else if($this->protection == 4) {
                return 5;
            }
        }
    }



}