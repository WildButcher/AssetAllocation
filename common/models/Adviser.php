<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "adviser".
 *
 * @property string $id
 * @property string $xingming
 * @property string $idnumber
 * @property string $mobliephone
 * @property string $email
 * @property string $dept
 * @property string $headurl 
 * @property string $username
 * @property string $password_hash
 * @property string $password
 * @property string $password_reset_token
 * @property string $auth_key
 * @property Allocation[] $allocations
 * @property Altemplate[] $altemplates
 */
class Adviser extends \yii\db\ActiveRecord implements IdentityInterface
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
       		[['auth_key', 'password_hash', 'username', 'xingming', 'idnumber', 'mobliephone', 'email'], 'required'],
       		[['auth_key'], 'string', 'max' => 32],
        	[['password_reset_token', 'password_hash', 'username', 'headurl', 'email', 'dept'], 'string', 'max' => 255],
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
        	'headurl' => '头像',
        	'auth_key' => 'Auth Key',
        	'password_reset_token' => 'Password Reset Token',
        	'password_hash' => '密码',
        	'password' => '',
        	'username' => '登录帐号',
            'dept' => '所属营业部',
        	'ischeck'=>'审核',
        ];
    }

    public function getPassword()
    {
    	return "**********";
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
    
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
    	return static::findOne(['id' => $id]);
    }
    
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    	throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
    	return static::findOne(['username' => $username]);
    }
    
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
    	if (!static::isPasswordResetTokenValid($token)) {
    		return null;
    	}
    	
    	return static::findOne([
    			'password_reset_token' => $token,
    	]);
    }
    
    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
    	if (empty($token)) {
    		return false;
    	}
    	
    	$timestamp = (int) substr($token, strrpos($token, '_') + 1);
    	$expire = Yii::$app->params['user.passwordResetTokenExpire'];
    	return $timestamp + $expire >= time();
    }
    
    /**
     * @inheritdoc
     */
    public function getId()
    {
    	return $this->getPrimaryKey();
    }
    
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
    	return $this->auth_key;
    }
    
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
    	return $this->getAuthKey() === $authKey;
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
    	return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
    	$this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
    	$this->auth_key = Yii::$app->security->generateRandomString();
    }
    
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
    	$this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
    	$this->password_reset_token = null;
    }
    
    public static function getPengdingAdviserCount(){
    	return Adviser::find()
			    		->where(['ischeck'=>0,])
			    		->count();
    }
}
