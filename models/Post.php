<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $name
 * @property int $thana
 *
 * @property Customer[] $customers
 * @property Thana $thana0
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['thana'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['thana'], 'exist', 'skipOnError' => true, 'targetClass' => Thana::className(), 'targetAttribute' => ['thana' => 'id']],
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
            'thana' => 'Thana',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['post' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getThana0()
    {
        return $this->hasOne(Thana::className(), ['id' => 'thana']);
    }
}
