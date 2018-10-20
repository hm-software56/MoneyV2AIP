<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dao_car".
 *
 * @property int $id
 * @property int $amount
 * @property string $date
 * @property string $status
 * @property string $remark
 * @property string $refer_id
 */
class DaoCar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dao_car';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amount', 'date'], 'required'],
            [['amount'], 'integer'],
            [['date'], 'safe'],
            [['status', 'remark'], 'string'],
            [['refer_id'], 'string', 'max' => 255],
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
            'date' => 'Date',
            'status' => 'Status',
            'remark' => 'Remark',
            'refer_id' => 'Refer ID',
        ];
    }
}
