<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medical_payments".
 *
 * @property integer $id
 * @property string $name
 * @property double $standart
 * @property double $premium
 */
class MedicalPayments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medical_payments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'standart', 'premium'], 'required'],
            [['standart', 'premium'], 'number'],
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
            'standart' => Yii::t('app', 'Standart'),
            'premium' => Yii::t('app', 'Premium'),
        ];
    }
}
