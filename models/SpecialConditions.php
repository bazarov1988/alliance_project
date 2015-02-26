<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "special_conditions".
 *
 * @property string $id
 * @property string $quote_id
 * @property integer $external_fire_alarm_system
 * @property integer $approved_watchman_service
 * @property integer $central_station_reporting
 * @property integer $smoke_detectors
 * @property integer $burglary_alarm_only
 * @property integer $fire_resistive
 * @property integer $sprinklered
 * @property integer $fire_resistive_sprinklered
 * @property integer $hood_and_duct
 * @property integer $above
 * @property integer $all_above
 * @property integer $metal_building
 * @property integer $storage_buildings
 * @property integer $conforming_code_specifications
 */
class SpecialConditions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'special_conditions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quote_id', 'external_fire_alarm_system', 'approved_watchman_service', 'central_station_reporting', 'smoke_detectors', 'burglary_alarm_only', 'fire_resistive', 'sprinklered', 'fire_resistive_sprinklered', 'hood_and_duct', 'above', 'all_above', 'metal_building', 'storage_buildings', 'conforming_code_specifications'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'quote_id' => Yii::t('app', 'Quote ID'),
            'external_fire_alarm_system' => Yii::t('app', 'External Fire Alarm System'),
            'approved_watchman_service' => Yii::t('app', 'Approved Watchman Service'),
            'central_station_reporting' => Yii::t('app', 'Central Station Reporting'),
            'smoke_detectors' => Yii::t('app', 'Smoke Detectors'),
            'burglary_alarm_only' => Yii::t('app', 'Burglary Alarm Only'),
            'fire_resistive' => Yii::t('app', 'Fire Resistive'),
            'sprinklered' => Yii::t('app', 'Sprinklered (Attach SF-53)'),
            'fire_resistive_sprinklered' => Yii::t('app', 'Fire Resistive Sprinklered'),
            'hood_and_duct' => Yii::t('app', 'Hood & Duct System conforming to standards'),
            'above' => Yii::t('app', 'Above, including approved fire suppression system'),
            'all_above' => Yii::t('app', 'All Above, including maintenance contracts'),
            'metal_building' => Yii::t('app', 'Metal Building with metal & frame supports'),
            'storage_buildings' => Yii::t('app', 'Storage Buildings with no utilities'),
            'conforming_code_specifications' => Yii::t('app', 'Underwriters Laboratory Approved Fire Appliances(conforming to code specifications)'),
        ];
    }
}
