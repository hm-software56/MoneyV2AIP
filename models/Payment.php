<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int $amount
 * @property string $description
 * @property string $date
 * @property string $refer_id
 * @property int $type_pay_id
 * @property int $user_id
 *
 * @property TypePay $typePay
 * @property User $user
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'date', 'type_pay_id', 'user_id'], 'required'],
            [['amount', 'type_pay_id', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['refer_id'], 'string', 'max' => 255],
            [['type_pay_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypePay::className(), 'targetAttribute' => ['type_pay_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'amount' => 'Amount',
            'description' => 'Description',
            'date' => 'Date',
            'refer_id' => 'Refer ID',
            'type_pay_id' => 'Type Pay ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypePay()
    {
        return $this->hasOne(TypePay::className(), ['id' => 'type_pay_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
