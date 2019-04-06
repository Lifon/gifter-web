<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $id
 * @property string $name
 *
 * @property District[] $districts
 * @property Nationality[] $nationalities
 * @property Vanue[] $vanues
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasMany(District::className(), ['country' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNationalities()
    {
        return $this->hasMany(Nationality::className(), ['country_name' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanues()
    {
        return $this->hasMany(Vanue::className(), ['country' => 'id']);
    }
}
