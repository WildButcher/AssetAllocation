<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "adviser".
 *
 * @property string $id
 * @property string $xingming
 * @property string $idnumber
 * @property string $mobliephone
 * @property string $email
 * @property string $dept
 *
 * @property Allocation[] $allocations
 * @property Altemplate[] $altemplates
 */
class Adviser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'adviser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['xingming', 'idnumber', 'mobliephone'], 'required'],
            [['xingming'], 'string', 'max' => 10],
            [['idnumber'], 'string', 'max' => 14],
            [['mobliephone'], 'string', 'max' => 11],
            [['email', 'dept'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'xingming' => '真实姓名',
            'idnumber' => '从业资格证',
            'mobliephone' => '手机',
            'email' => 'Email',
            'dept' => '所属营业部',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAllocations()
    {
        return $this->hasMany(Allocation::className(), ['oid' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAltemplates()
    {
        return $this->hasMany(Altemplate::className(), ['oid' => 'id']);
    }
}
