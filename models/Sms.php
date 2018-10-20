<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sms".
 *
 * @property int $id
 * @property string $title
 * @property string $details
 * @property string $date
 * @property int $by_user
 * @property int $user_id
 *
 * @property User $user
 */
class Sms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'details', 'by_user', 'user_id'], 'required'],
            [['details'], 'string'],
            [['date'], 'safe'],
            [['by_user', 'user_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'details' => 'Details',
            'date' => 'Date',
            'by_user' => 'By User',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
