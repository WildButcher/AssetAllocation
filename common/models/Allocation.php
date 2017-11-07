<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "allocation".
 *
 * @property string $id
 * @property string $filename
 * @property string $createtime
 * @property string $publictime
 * @property string $downcount
 * @property string $filelinks
 * @property string $filecontent
 * @property string $isshare
 * @property string $lid
 * @property string $status
 * @property string $oid
 *
 * @property Syscode $isshare0
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
            [['filename', 'isshare', 'status', 'oid'], 'required'],
            [['createtime', 'publictime'], 'safe'],
            [['downcount', 'isshare', 'lid', 'status', 'oid'], 'integer'],
            [['filecontent'], 'string'],
            [['filename', 'filelinks'], 'string', 'max' => 255],
            [['isshare'], 'exist', 'skipOnError' => true, 'targetClass' => Syscode::className(), 'targetAttribute' => ['isshare' => 'id']],
            [['oid'], 'exist', 'skipOnError' => true, 'targetClass' => Adviser::className(), 'targetAttribute' => ['oid' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Syscode::className(), 'targetAttribute' => ['status' => 'id']],
        	[['lid'], 'exist', 'skipOnError' => true, 'targetClass' => Altemplate::className(), 'targetAttribute' => ['lid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        		'id' => 'ID',
        		'filename' => '资产配置名称',
        		'createtime' => '建立时间',
        		'publictime' => '发布时间',
        		'downcount' => '下载次数',
        		'filelinks' => '链接地址',
        		'filecontent' => '文件内容',
        		'isshare' => '是否共享',
        		'lid' => '继承模板',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getL()
    {
    	return $this->hasOne(Altemplate::className(), ['id' => 'lid']);
    }
    
    public function getUrl()
    {
    	return Yii::$app->urlManager->createUrl(
    			['allocation/detail','id'=>$this->id,'filename'=>$this->filename]
    			);
    }
    
    public function getDownUrl()
    {
    	return Yii::$app->urlManager->createUrl(
    			['allocation/detail','id'=>$this->id,'filename'=>$this->filename]
    			);
    }
}
