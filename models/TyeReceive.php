<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tye_receive".
 *
 * @property int $id
 * @property string $name
 * @property int $sort
 * @property int $status
 */
class TyeReceive extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tye_receive';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort', 'status'], 'integer'],
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
            'sort' => 'Sort',
            'status' => 'Status',
        ];
    }
}
