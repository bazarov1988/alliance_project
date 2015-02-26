<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property integer $id
 * @property string $name
 * @property integer $sub_zone
 * @property integer $eq_class
 * @property integer $eq_zone
 * @property double $factor
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'sub_zone', 'eq_zone'], 'required'],
            [['sub_zone', 'eq_class', 'eq_zone'], 'integer'],
            [['factor'], 'number'],
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
            'sub_zone' => Yii::t('app', 'Sub Zone'),
            'eq_class' => Yii::t('app', 'Eq Class'),
            'eq_zone' => Yii::t('app', 'Eq Zone'),
            'factor' => Yii::t('app', 'Factor'),
        ];
    }
}
