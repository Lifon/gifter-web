<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "district".
 *
 * @property int $id
 * @property string $name
 * @property int $country
 *
 * @property Customer[] $customers
 * @property Country $country0
 * @property Thana[] $thanas
 * @property Vanue[] $vanues
 */
class District extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'district';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['country'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'country' => 'Country',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['district' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry0()
    {
        return $this->hasOne(Country::className(), ['id' => 'country']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThanas()
    {
        return $this->hasMany(Thana::className(), ['district' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanues()
    {
        return $this->hasMany(Vanue::className(), ['district' => 'id']);
    }
}
