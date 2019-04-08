<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property string $name
 * @property string $dob
 * @property string $gender
 * @property int $nationality
 * @property int $district
 * @property int $thana
 * @property int $post
 * @property string $area
 * @property string $road
 * @property string $house
 * @property int $religion
 * @property string $marital_status
 * @property int $user_id
 *
 * @property CartList[] $cartLists
 * @property Nationality $nationality0
 * @property District $district0
 * @property Thana $thana0
 * @property Post $post0
 * @property Religion $religion0
 * @property Users $user
 * @property Email[] $emails
 * @property Event[] $events
 * @property EventManager[] $eventManagers
 * @property FriendList[] $friendLists
 * @property FriendList[] $friendLists0
 * @property Invite[] $invites
 * @property Invite[] $invites0
 * @property Invoice[] $invoices
 * @property PhoneNumbers[] $phoneNumbers
 * @property WishList[] $wishLists
 * @property WishListTaggedTo[] $wishListTaggedTos
 */
class Customer extends \yii\db\ActiveRecord
{
    public $password;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dob'], 'safe'],
            [['gender', 'marital_status','password'], 'required'],
            [['gender', 'marital_status'], 'string'],
            [['nationality', 'district', 'thana', 'post', 'religion', 'user_id'], 'integer'],
            [['name','password'], 'string', 'max' => 350],
            [['area', 'road', 'house'], 'string', 'max' => 255],
            [['nationality'], 'exist', 'skipOnError' => true, 'targetClass' => Nationality::className(), 'targetAttribute' => ['nationality' => 'id']],
            [['district'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district' => 'id']],
            [['thana'], 'exist', 'skipOnError' => true, 'targetClass' => Thana::className(), 'targetAttribute' => ['thana' => 'id']],
            [['post'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post' => 'id']],
            [['religion'], 'exist', 'skipOnError' => true, 'targetClass' => Religion::className(), 'targetAttribute' => ['religion' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'dob' => 'Dob',
            'gender' => 'Gender',
            'nationality' => 'Nationality',
            'district' => 'District',
            'thana' => 'Thana',
            'post' => 'Post',
            'area' => 'Area',
            'road' => 'Road',
            'house' => 'House',
            'religion' => 'Religion',
            'marital_status' => 'Marital Status',
            'user_id' => 'User ID',
            'password' => 'Pass Word',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCartLists()
    {
        return $this->hasMany(CartList::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNationality0()
    {
        return $this->hasOne(Nationality::className(), ['id' => 'nationality']);
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
    public function getThana0()
    {
        return $this->hasOne(Thana::className(), ['id' => 'thana']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost0()
    {
        return $this->hasOne(Post::className(), ['id' => 'post']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReligion0()
    {
        return $this->hasOne(Religion::className(), ['id' => 'religion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmails()
    {
        return $this->hasMany(Email::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['host' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventManagers()
    {
        return $this->hasMany(EventManager::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriendLists()
    {
        return $this->hasMany(FriendList::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriendLists0()
    {
        return $this->hasMany(FriendList::className(), ['relation_with' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvites()
    {
        return $this->hasMany(Invite::className(), ['guest_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvites0()
    {
        return $this->hasMany(Invite::className(), ['invited_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhoneNumbers()
    {
        return $this->hasMany(PhoneNumbers::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishLists()
    {
        return $this->hasMany(WishList::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWishListTaggedTos()
    {
        return $this->hasMany(WishListTaggedTo::className(), ['customer_id' => 'id']);
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
