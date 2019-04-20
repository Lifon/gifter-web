<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "privilege".
 *
 * @property int $id
 * @property string $name
 *
 * @property Users[] $users
 */
class Privilege extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'privilege';
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
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['privilege' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return PrivilegeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PrivilegeQuery(get_called_class());
    }
}
