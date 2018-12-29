<?php
/**
 * Created by PhpStorm.
 * User: ZQ
 * Date: 2018/12/26
 * Time: 17:32
 */

namespace backend\components\user\identity;


use yii\base\Model;
use yii\db\ActiveRecord;


/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    public $repassword; // 重复密码
    public $verifyCode; // 验证码



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'unique', 'targetClass' => User::className(), 'message' => '该用户名已被占用'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'email','message' => '请检查邮箱的格式'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::className(), 'message' => '该邮箱已被注册'],

            [['username','email','password','repassword','verifyCode'], 'required','message' => '{attribute}不能为空'],
            ['password', 'string', 'min' => 6],
            ['repassword', 'compare', 'compareAttribute' => 'password','message'=>'两次输入的密码不一致！'],

            ['verifyCode', 'captcha'],
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

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
            'verifyCode' => '验证码',
            'repassword' => '确认密码',
            'email' => '邮箱',
        ];
    }
}