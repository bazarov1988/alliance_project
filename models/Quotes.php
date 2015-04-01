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
    private  $bldg_composite;
    private  $bp_composite;
    private  $total_results;

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

    public function getBldgComposite(){
        if(!$this->bldg_composite){
            $this->bldg_composite = round(round(round(round(round(round(round($this->getTableRateBuilding() * $this->getBuildingZoneFactor(), 4) * $this->getLeadFactor(), 4) * $this->getBuildingAmountOfIns(), 4) * $this->getDeductibleFactorBuilding(), 4) * $this->getBuildingCredits(), 4) * $this->getSpecialConditionsBuilding(), 4) * $this->getAggregateFactor(), 0);
//old formala
            /*$old = round(
                round(
                    round(
                        round(
                            round(
                                round(
                                    round($this->getTableRateBuilding()*$this->getBuildingZoneFactor(),4)*
                                    $this->getLeadFactor(),4)*
                                $this->getBuildingAmountOfIns(),4)*
                            $this->getDeductibleFactorBuilding(),4)*
                        $this->getBuildingCredits(),4)*
                    $this->getSpecialConditionsBuilding(),4)*
                $this->getAggregateFactor(),4);*/
        }

        return $this->bldg_composite;
    }

    public function getTableRateBuilding(){
        $row = (string)$this->getEnteredBuilding();
        if(!empty(\Yii::$app->params['quote']['rate_table'][$row])){
            $col = $this->getRateTableKey();
            if(!empty(\Yii::$app->params['quote']['rate_table'][$row])&&!empty(\Yii::$app->params['quote']['rate_table'][$row][$col])){
                return \Yii::$app->params['quote']['rate_table'][$row][$col];
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    /**
     * @return int
     * getter methods
     */


    public function getEnteredBuilding(){
//=CONCATENATE($'List Sheet'.O2,$'List Sheet'.C2,A2,$'List Sheet'.M2,A7,$'List Sheet'.G2,A6,A5)
        $o2 = !empty($this->prior_since)?$this->prior_since:0;
        $c2 = !empty($this->zone)?$this->zone:0;
        $a2 = 0;
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

    public function getRateTableKey()
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

    public function getBuildingZoneFactor(){
        $occup = $this->occupancy?$this->occupancy->mer_serc:0;
        $concat = (int)\Yii::$app->excel->concat([$occup,1]);
        if($concat>10){
            $z2 = ($this->zone==1?$this->countryModel->sub_zone:7)+1;
            return \Yii::$app->excel->vlookup($concat,\Yii::$app->params['quote']['zone_factors'],$z2-2,false);
        } else {
            return 0;
        }
    }

    public function getLeadFactor(){
        if($this->apt_in_bldg==2&&$this->does_lead_exclusion_apply==1){
            if($this->occupied==97){
                return \Yii::$app->params['quote']['factor_credit']['restaurant'];
            } else {
                return \Yii::$app->params['quote']['factor_credit']['all_others'];
            }
        } else {
            return 1;
        }
    }

    public function getBuildingAmountOfIns(){
        return (int)$this->building_amount_of_ins/100;
    }

    public function getDeductibleFactorBuilding(){
        //=IF(AND($'List Sheet'.$P$2<>"",$'List Sheet'.$P$2<>0,$'List Sheet'.$P$2<>8),VLOOKUP($'List Sheet'.$P$2,$'List Sheet'.$AL$3:$AN$9,3,FALSE()),0)
        if(!empty($this->deductible_bldg)&&$this->deductible_bldg!=8){
            return \Yii::$app->excel->vlookup($this->deductible_bldg,\Yii::$app->params['quote']['deductible_factors'],1,0);
        } else {
            return 0;
        }
    }

    public function getBuildingCredits(){
        //=IF(AA2=1,AA3,IF(AA2<1,AA2,1))
        $aa2 = $this->getSoleOccup_MercantileFactor();
        if($aa2==1){
            return $this->getService_MercantileOccupFactor();
        } else {
            if($aa2<1){
                return $aa2;
            } else {
                return 1;
            }
        }
    }

    public function getSoleOccup_MercantileFactor(){
    //=IF($'List Sheet'.R2=1,IF($'List Sheet'.G2=1,$'List Sheet'.AS3,1),1)
        if($this->sole_occupancy==1){
            if($this->occupancy&&$this->occupancy->mer_serc==1){
                return \Yii::$app->params['quote']['b_bp_credits']['sole'];
            } else {
                return 1;
            }
        } else {
            return 1;
        }

    }

    public function getService_MercantileOccupFactor(){
    //=IF($'List Sheet'.S2=1,IF($'List Sheet'.G2=2,$'List Sheet'.AS4,1),1)
        if($this->mercantile_occupany_in_bldg==1){
            if($this->occupancy&&$this->occupancy->mer_serc==2){
                return \Yii::$app->params['quote']['b_bp_credits']['merc'];
            } else {
                return 1;
            }
        } else {
            return 1;
        }
    }

    public function getSpecialConditionsBuilding(){
        return 1-$this->specialConditions->getSum();
    }

    public function getAggregateFactor(){
        //=IF($'List Sheet'.EN2<>"",VLOOKUP($'List Sheet'.EN2,$'List Sheet'.BA3:BH8,AE1,FALSE()),0)
        if(!empty($this->prop_damage)){
            return  \Yii::$app->excel->vlookup($this->prop_damage,\Yii::$app->params['quote']['aggregate_factors'],$this->agregate-1,false);
        } else {
            return 0;
        }

    }

    public function getBPComposite(){
        if(!$this->bp_composite){
            $this->bp_composite = round(round(round(round(round(round(round($this->getTableRateBP() * $this->getBPZoneFactor(),4)*$this->getLeadFactor(),4)*$this->getBPAmountOfIns(),4)*$this->getDeductibleFactorBP(),4)*$this->getBPCredits(),4)*$this->getSpecialConditionsBP(),4)*$this->getAggregateFactor(),0);
        }
        return $this->bp_composite;
    }

    public function getTableRateBP(){
        $row = (string)$this->getEnteredBP();
        if(!empty(\Yii::$app->params['quote']['rate_table'][$row])){
            $col = $this->getRateTableKey();
            if(!empty(\Yii::$app->params['quote']['rate_table'][$row][$col])){
                return \Yii::$app->params['quote']['rate_table'][$row][$col];
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    public function getEnteredBP(){
//=CONCATENATE($'List Sheet'.O2,$'List Sheet'.C2,A2,$'List Sheet'.N2,B7,$'List Sheet'.G2,B6,B5)
        $o2 = !empty($this->prior_since)?$this->prior_since:0;
        $c2 = !empty($this->zone)?$this->zone:0;
        $a2 = '';
        if(!empty($this->construction)){
            $a2 = ($this->construction==3)?2:$this->construction;
        }
        $n2 = !empty($this->business_property_rc_acv)?$this->business_property_rc_acv:0;
        $g2 = $this->occupancy?$this->occupancy->mer_serc:0;
        $b7 = $g2>5?9:2;
        $k2 = !empty($this->occupied_type)?$this->occupied_type:0;
        $b6 = $g2==8?$k2:9;
        $h2 = $this->occupancy?$this->occupancy->rate_group:0;
        $b5 = $g2<3?$h2:9;
        return \Yii::$app->excel->concat([$o2,$c2,$a2,$n2,$b7,$g2,$b6,$b5]);
    }

    public function getBPZoneFactor(){
        $occup = $this->occupancy?$this->occupancy->mer_serc:0;
        $concat= (int)\Yii::$app->excel->concat([$occup,2]);
        if($concat>10){
            $z2 = ($this->zone==1?$this->countryModel->sub_zone:7)+1;
            return \Yii::$app->excel->vlookup($concat,\Yii::$app->params['quote']['zone_factors'],$z2-2,false);
        } else {
            return 0;
        }
    }

    public function getBPAmountOfIns(){
        return (int)$this->bus_amount_of_ins/100;
    }

    public function getDeductibleFactorBP(){
        //=IF(AND($'List Sheet'.$P$16<>"",$'List Sheet'.$P$16<>0,$'List Sheet'.$P$16<>8),VLOOKUP($'List Sheet'.$P$16,$'List Sheet'.$AL$3:$AN$9,3,FALSE()),0)
        if(!empty($this->deductible_bp)&&$this->deductible_bp!=8){
            return \Yii::$app->excel->vlookup($this->deductible_bp,\Yii::$app->params['quote']['deductible_factors'],1,0);
        } else {
            return 0;
        }
    }

    public function getBPCredits(){
        return $this->getBuilding_BP_Together();
    }

    public function getBuilding_BP_Together(){
    //=IF($'Entry Sheet'.C21>0,IF($'Entry Sheet'.C22>0,IF($'List Sheet'.G2<3,IF($'List Sheet'.C2=3,$'List Sheet'.AS7,$'List Sheet'.AS6),1),1),1)
        if($this->building_amount_of_ins>0){
            if($this->bus_amount_of_ins>0){
                if($this->occupancy&&$this->occupancy->mer_serc<3){
                    if($this->zone == 3){
                        return \Yii::$app->params['quote']['b_bp_together']['zone_3'];
                    } else {
                        return \Yii::$app->params['quote']['b_bp_together']['zone_1_2'];
                    }
                } else {
                    return 1;
                }
            } else {
                return 1;
            }
        } else {
            return 1;
        }
    }

    public function getSpecialConditionsBP(){
        return 1-$this->specialConditions->getSum();
    }

    public function needIRPM(){
        if($this->getPremium()>3499){
            return true;
        } else {
            return false;
        }
    }

    public function getPremium(){
        return round($this->total_results['premium'],0);
    }

    public function getTotalResults(){
        $this->total_results = $this->liabilityCoverages->getTotalResults();
        return $this->total_results;
    }

    public function getIRPM()
    {
        return round($this->total_results['irpm'],0);
    }

    public function getFireFree(){
        return round($this->total_results['fire_free'],0);
    }

    public function getPremiumTotal(){
        return round($this->total_results['total_premium'],0);
    }

}