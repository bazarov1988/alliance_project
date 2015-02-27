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
}