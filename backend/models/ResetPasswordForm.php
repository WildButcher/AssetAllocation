<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;
use common\models\Adviser;
/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
    public $password;

    /**
     * @var \common\models\User
     */
    private $_user;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
    	return ['password'=>'',
    			];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword($id)
    {
        $user = User::findOne(['id'=>$id]);
        $user->setPassword($this->password);
        return $user->save(false);
    }
    
    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetAvPassword($id)
    {
    	$user = Adviser::findOne(['id'=>$id]);
    	$user->setPassword($this->password);
    	return $user->save(false);
    }
}
