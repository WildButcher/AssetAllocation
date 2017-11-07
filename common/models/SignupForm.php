<?php
namespace common\models;

use yii\base\Model;
use common\models\Adviser;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $dept;
    public $password;
    public $xingming;
    public $idnumber;
    public $mobliephone;
    public $password_repeat;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Adviser', 'message' => '用户名已经存在！'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Adviser', 'message' => 'Email地址已经存在！'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        	['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => '两次输入的密码不一致！'],
        		
        	['xingming', 'required'],
        	['xingming', 'string', 'max' => 10],
        	['idnumber', 'required'],
        	['idnumber', 'string', 'max' => 14],
        	['mobliephone','string', 'max' => 11],
        	['dept', 'string', 'max' => 255],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
    	return [
    			'xingming' => '真实姓名',
    			'idnumber' => '从业资格证',
    			'mobliephone' => '手机',
    			'email' => 'Email',
    			'auth_key' => 'Auth Key',
    			'password_reset_token' => 'Password Reset Token',
    			'password' => '密码',
    			'password_repeat' => '重输密码',
    			'username' => '登录帐号',
    			'dept' => '所属营业部',
    	];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new Adviser();
        $user->username = $this->username;
        $user->xingming= $this->xingming;
        $user->idnumber= $this->idnumber;
        $user->mobliephone= $this->mobliephone;
        $user->email = $this->email;
        $user->dept = $this->dept;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
}
