<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $id
 * @property double $rate
 * @property integer $buypoint
 * @property integer $term
 * @property double $profit
 * @property string $createtime
 * @property string $status
 *
 * @property Allocation[] $allocations
 * @property Syscode $status0
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rate', 'buypoint', 'term', 'profit', 'createtime', 'status'], 'required'],
            [['rate', 'profit'], 'number'],
            [['buypoint', 'term', 'status'], 'integer'],
            [['createtime'], 'safe'],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Syscode::className(), 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rate' => '年化利率',
            'buypoint' => '起购金额',
            'term' => '产品期限',
            'profit' => '到期获利',
            'createtime' => '创建时间',
            'status' => '产品状态',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAllocations()
    {
        return $this->hasMany(Allocation::className(), ['lid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Syscode::className(), ['id' => 'status']);
    }
}
