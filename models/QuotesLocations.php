<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quotes_locations".
 *
 * @property string $id
 * @property integer $quote_id
 * @property integer $occupancy_id
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
            [['quote_id', 'occupancy_id'], 'required'],
            [['quote_id', 'occupancy_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'quote_id' => 'Quote ID',
            'occupancy_id' => 'Occupancy ID',
        ];
    }
}
