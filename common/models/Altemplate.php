<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "altemplate".
 *
 * @property string $id
 * @property string $templatename
 * @property string $createtime
 * @property string $filecontent
 * @property string $isshare
 * @property string $oid
 * @property string $status
 *
 * @property Syscode $isshare0
 * @property Adviser $o
 * @property Syscode $status0
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
            [['templatename', 'isshare', 'oid', 'status'], 'required'],
            [['createtime'], 'safe'],
            [['filecontent'], 'string'],
            [['isshare', 'oid', 'status'], 'integer'],
            [['templatename'], 'string', 'max' => 255],
            [['isshare'], 'exist', 'skipOnError' => true, 'targetClass' => Syscode::className(), 'targetAttribute' => ['isshare' => 'id']],
            [['oid'], 'exist', 'skipOnError' => true, 'targetClass' => Adviser::className(), 'targetAttribute' => ['oid' => 'id']],
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
        		'templatename' => '模版名称',
        		'createtime' => '建立时间',
        		'filecontent' => '模版内容',
        		'isshare' => '是否共享',
        		'oid' => '所属投顾',
        		'status' => '状态',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIsshare0()
    {
        return $this->hasOne(Syscode::className(), ['id' => 'isshare']);
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
}
