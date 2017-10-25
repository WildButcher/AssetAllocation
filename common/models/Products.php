<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property string $id
 * @property string $pname
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
            [['pname', 'rate', 'buypoint', 'term', 'profit', 'status'], 'required'],
            [['rate', 'profit'], 'number'],
            [['buypoint', 'term', 'status'], 'integer'],
            [['createtime'], 'safe'],
            [['pname'], 'string', 'max' => 255],
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
            'pname' => '理财产品名称',
            'rate' => '年化利率',
            'buypoint' => '购买起点',
            'term' => '持有周期',
            'profit' => '到期利润',
            'createtime' => '建立时间',
            'status' => '状态',
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
