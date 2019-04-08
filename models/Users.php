<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $privilege
 * @property string $last_update
 *
 * @property Customer[] $customers
 * @property Privilege $privilege0
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['privilege'], 'integer'],
            [['username', 'password'], 'required'],
            [['username', 'password', 'last_update'], 'string', 'max' => 255],
            [['privilege'], 'exist', 'skipOnError' => true, 'targetClass' => Privilege::className(), 'targetAttribute' => ['privilege' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'privilege' => 'Privilege',
            'last_update' => 'Last Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrivilege0()
    {
        return $this->hasOne(Privilege::className(), ['id' => 'privilege']);
    }
}
