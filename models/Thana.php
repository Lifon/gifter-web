<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "thana".
 *
 * @property int $id
 * @property string $name
 * @property int $district
 *
 * @property Customer[] $customers
 * @property Post[] $posts
 * @property District $district0
 * @property Vanue[] $vanues
 */
class Thana extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'thana';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['district'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['district'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district' => 'id']],
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
            'district' => 'District',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['thana' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['thana' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict0()
    {
        return $this->hasOne(District::className(), ['id' => 'district']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVanues()
    {
        return $this->hasMany(Vanue::className(), ['thana' => 'id']);
    }
}
