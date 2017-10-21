<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "altemplate".
 *
 * @property string $id
 * @property string $createtime
 * @property string $filecontent
 * @property integer $isshare
 * @property string $oid
 * @property string $status
 *
 * @property Syscode $status0
 * @property Adviser $o
 */
class Altemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'altemplate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createtime', 'isshare', 'oid', 'status'], 'required'],
            [['createtime'], 'safe'],
            [['filecontent'], 'string'],
            [['isshare', 'oid', 'status'], 'integer'],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Syscode::className(), 'targetAttribute' => ['status' => 'id']],
            [['oid'], 'exist', 'skipOnError' => true, 'targetClass' => Adviser::className(), 'targetAttribute' => ['oid' => 'id']],
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
            'filecontent' => 'Filecontent',
            'isshare' => 'Isshare',
            'oid' => 'Oid',
            'status' => 'Status',
        ];
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
    public function getO()
    {
        return $this->hasOne(Adviser::className(), ['id' => 'oid']);
    }
}
