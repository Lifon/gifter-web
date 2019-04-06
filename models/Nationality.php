<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nationality".
 *
 * @property int $id
 * @property string $nationality_name
 * @property int $country_name
 *
 * @property Customer[] $customers
 * @property Country $countryName
 */
class Nationality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nationality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_name'], 'integer'],
            [['nationality_name'], 'string', 'max' => 255],
            [['country_name'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_name' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nationality_name' => 'Nationality Name',
            'country_name' => 'Country Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['nationality' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountryName()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_name']);
    }
}
