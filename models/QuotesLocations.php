<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quotes_locations".
 *
 * @property string $id
 * @property integer $quote_id
 * @property integer $occupancy_id
 * @property integer $clergypersons
 * @property integer $clergypersons_liability
 */
class QuotesLocations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quotes_locations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
	            [[
		            'quote_id',
		            'occupancy_id'
	            ], 'required'
	            ],
	            [
	            [
	            'quote_id',
	            'occupancy_id',
	            'clergypersons',
	            'clergypersons_liability'
	            ],
	            'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                     => 'ID',
            'quote_id'               => 'Quote ID',
            'occupancy_id'           => 'Occupancy ID',
	        'clergypersons_liability'=>'Clergy Persons Liability',
	        'clergypersons'          =>'Clergy Persons'
        ];
    }

	public function getLocation(){
		return $this->hasOne(Occupancy::className(),['id'=>'occupancy_id']);
	}
}
