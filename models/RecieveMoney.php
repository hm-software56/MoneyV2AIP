<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recieve_money".
 *
 * @property int $id
 * @property int $amount
 * @property string $description
 * @property string $date
 * @property string $refer_id
 * @property int $tye_receive_id
 * @property int $user_id
 *
 * @property TyeReceive $tyeReceive
 * @property User $user
 */
class RecieveMoney extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recieve_money';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'date', 'tye_receive_id', 'user_id'], 'required'],
            [['amount', 'tye_receive_id', 'user_id'], 'integer'],
            [['description'], 'string'],
            [['date'], 'safe'],
            [['refer_id'], 'string', 'max' => 255],
            [['tye_receive_id'], 'exist', 'skipOnError' => true, 'targetClass' => TyeReceive::className(), 'targetAttribute' => ['tye_receive_id' => 'id']],
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
            'tye_receive_id' => 'Tye Receive ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTyeReceive()
    {
        return $this->hasOne(TyeReceive::className(), ['id' => 'tye_receive_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
