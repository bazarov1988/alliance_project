<?php
/**
 * Created by PhpStorm.
 * User: roman
 * Date: 27.02.15
 * Time: 18:57
 */
namespace app\models;
use app\models\_base\BaseSpecialConditions;

class SpecialConditions extends BaseSpecialConditions{


    public function getExternalFireAlarmSystem(){
        if(!empty($this->external_fire_alarm_system)){
            return \Yii::$app->params['quote']['special_conditions']['external_fire_alarm_system'];
        } else {
            return 0;
        }
    }

    public function getApprovedWatchmanService(){
        if(!empty($this->approved_watchman_service)){
            return \Yii::$app->params['quote']['special_conditions']['approved_watchman_service'];
        } else {
            return 0;
        }
    }

    public function getCentralStationReporting(){
        if(!empty($this->central_station_reporting)){
            return \Yii::$app->params['quote']['special_conditions']['central_station_reporting'];
        } else {
            return 0;
        }
    }

    public function getSmokeDetectors(){
        if(!empty($this->smoke_detectors)){
            return \Yii::$app->params['quote']['special_conditions']['smoke_detectors'];
        } else {
            return 0;
        }
    }

    public function getBurglaryAlarmOnly(){
        if(!empty($this->burglary_alarm_only)){
            return \Yii::$app->params['quote']['special_conditions']['burglary_alarm_only'];
        } else {
            return 0;
        }
    }

    public function getFireResistive(){
        if(!empty($this->fire_resistive)){
            return \Yii::$app->params['quote']['special_conditions']['fire_resistive'];
        } else {
            return 0;
        }
    }

    public function getSprinklered(){
        if(!empty($this->sprinklered)){
            return \Yii::$app->params['quote']['special_conditions']['sprinklered'];
        } else {
            return 0;
        }
    }

    public function getFireResistiveSprinklered(){
        if(!empty($this->fire_resistive_sprinklered)){
            return (\Yii::$app->params['quote']['special_conditions']['fire_resistive_sprinklered']-\Yii::$app->params['quote']['special_conditions']['fire_resistive']);
        } else {
            return 0;
        }
    }

    public function getHoodAndDuct(){
        if(!empty($this->hood_and_duct)){
            if(!empty($this->above)){
                return 0;
            } else {
                if(!empty($this->all_above)){
                    return 0;
                } else {
                    return \Yii::$app->params['quote']['hood_and_duct'];
                }
            }
        } else {
            return 0;
        }
    }

    public function getAbove(){
        if(!empty($this->above)){
            if(!empty($this->all_above)){
                return 0;
            } else {
                return \Yii::$app->params['quote']['special_conditions']['above'];
            }
        } else {
            return 0;
        }
    }

    public function getAllAbove(){
        if(!empty($this->all_above)){
            return \Yii::$app->params['quote']['special_conditions']['all_above'];
        } else {
            return 0;
        }
    }

    public function getMetalBuilding(){
        if(!empty($this->metal_building)){
            return \Yii::$app->params['quote']['special_conditions']['metal_building'];
        } else {
            return 0;
        }
    }

    public function getStorageBuildings(){
        if(!empty($this->storage_buildings)){
            return \Yii::$app->params['quote']['special_conditions']['storage_buildings'];
        } else {
            return 0;
        }
    }

    public function getConformingCodeSpecifications(){
        if(!empty($this->conforming_code_specifications)){
            return \Yii::$app->params['quote']['special_conditions']['conforming_code_specifications'];
        } else {
            return 0;
        }
    }

    public function getSum(){
        return array_sum([
            $this->getExternalFireAlarmSystem(),
            $this->getApprovedWatchmanService(),
            $this->getCentralStationReporting(),
            $this->getSmokeDetectors(),
            $this->getBurglaryAlarmOnly(),
            $this->getFireResistive(),
            $this->getSprinklered(),
            $this->getFireResistiveSprinklered(),
            $this->getHoodAndDuct(),
            $this->getAbove(),
            $this->getAllAbove(),
            $this->getMetalBuilding(),
            $this->getStorageBuildings(),
            $this->getConformingCodeSpecifications()
        ])/100;
    }

}