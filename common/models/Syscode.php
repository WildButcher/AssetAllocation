<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "syscode".
 *
 * @property string $id
 * @property string $majorcode
 * @property string $minicode
 * @property string $meaning
 *
 * @property Allocation[] $allocations
 * @property Altemplate[] $altemplates
 * @property Products[] $products
 */
class Syscode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'syscode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['majorcode', 'minicode', 'meaning'], 'required'],
            [['majorcode', 'minicode'], 'string', 'max' => 20],
            [['meaning'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'majorcode' => '主码',
            'minicode' => '次码',
            'meaning' => '意义',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAllocations()
    {
        return $this->hasMany(Allocation::className(), ['status' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAltemplates()
    {
        return $this->hasMany(Altemplate::className(), ['status' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::className(), ['status' => 'id']);
    }
}
