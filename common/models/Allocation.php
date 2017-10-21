<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "allocation".
 *
 * @property string $id
 * @property string $createtime
 * @property string $publictime
 * @property integer $downcount
 * @property string $filelinks
 * @property string $filecontent
 * @property integer $isshare
 * @property string $lid
 * @property string $status
 * @property string $oid
 *
 * @property Adviser $o
 * @property Syscode $status0
 * @property Products $l
 */
class Allocation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'allocation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createtime', 'isshare', 'lid', 'status', 'oid'], 'required'],
            [['createtime', 'publictime'], 'safe'],
            [['downcount', 'isshare', 'lid', 'status', 'oid'], 'integer'],
            [['filecontent'], 'string'],
            [['filelinks'], 'string', 'max' => 255],
            [['oid'], 'exist', 'skipOnError' => true, 'targetClass' => Adviser::className(), 'targetAttribute' => ['oid' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Syscode::className(), 'targetAttribute' => ['status' => 'id']],
            [['lid'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['lid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'createtime' => 'Createtime',
            'publictime' => 'Publictime',
            'downcount' => 'Downcount',
            'filelinks' => 'Filelinks',
            'filecontent' => 'Filecontent',
            'isshare' => 'Isshare',
            'lid' => 'Lid',
            'status' => 'Status',
            'oid' => 'Oid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getO()
    {
        return $this->hasOne(Adviser::className(), ['id' => 'oid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Syscode::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getL()
    {
        return $this->hasOne(Products::className(), ['id' => 'lid']);
    }
}
