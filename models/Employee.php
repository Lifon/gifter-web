<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property string $id
 * @property string $name
 * @property string $dep_id
 * @property double $salary
 *
 * @property Department $dep
 */
class Employee extends \yii\db\ActiveRecord {

    const SCENARIO_CREATE = 'create';

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['name', 'dep_id'], 'required'],
            [['dep_id'], 'integer'],
            [['salary'], 'number'],
            [['name'], 'string', 'max' => 250],
            [['dep_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['dep_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'dep_id' => 'Dep ID',
            'salary' => 'Salary',
        ];
    }

    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['name', 'dep_id', 'salary'];
        return $scenarios;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDep() {
        return $this->hasOne(Department::className(), ['id' => 'dep_id']);
    }

}
