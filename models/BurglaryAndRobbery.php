<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "burglary_and_robbery".
 *
 * @property integer $id
 * @property string $name
 * @property integer $first_group
 * @property integer $second_group
 * @property integer $third_group
 * @property integer $fourth_group
 */
class BurglaryAndRobbery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'burglary_and_robbery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'first_group', 'second_group', 'third_group', 'fourth_group'], 'required'],
            [['first_group', 'second_group', 'third_group', 'fourth_group'], 'integer'],
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
            'first_group' => Yii::t('app', 'First Group'),
            'second_group' => Yii::t('app', 'Second Group'),
            'third_group' => Yii::t('app', 'Third Group'),
            'fourth_group' => Yii::t('app', 'Fourth Group'),
        ];
    }
}
