<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $photo
 * @property string $bg_photo
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $password
 * @property int $status
 * @property string $user_type
 * @property string $date
 * @property int $user_role_id
 * @property string $player_id
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'username', 'password', 'user_type', 'date', 'user_role_id'], 'required'],
            [['status', 'user_role_id'], 'integer'],
            [['user_type', 'player_id'], 'string'],
            [['date'], 'safe'],
            [['photo'], 'string', 'max' => 45],
            [['bg_photo', 'first_name', 'last_name', 'username', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'Photo',
            'bg_photo' => 'Bg Photo',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'username' => 'Username',
            'password' => 'Password',
            'status' => 'Status',
            'user_type' => 'User Type',
            'date' => 'Date',
            'user_role_id' => 'User Role ID',
            'player_id' => 'Player ID',
        ];
    }
}
