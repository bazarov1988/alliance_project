<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bop_limit".
 *
 * @property integer $id
 * @property string $name
 * @property double $rate
 * @property integer $minimum
 */
class Clergy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bop_limit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'rate', 'minimum'], 'required'],
            [['rate'], 'number'],
            [['minimum'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'rate' => Yii::t('app', 'Rate'),
            'minimum' => Yii::t('app', 'Minimum'),
        ];
    }
}
