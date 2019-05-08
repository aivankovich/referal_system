<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $phone;
    public $name;
    public $city;
    public $surname;
    public $reCaptcha;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['phone', 'trim'],
            ['phone', 'required'],
            ['phone', 'string', 'max' => 255],
            ['phone', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This phone number has already been taken.'],
            ['name', 'required'],
            ['name', 'string', 'max' => 255],
            ['city', 'required'],
            ['city', 'string', 'max' => 255],
            ['surname', 'required'],
            ['surname', 'string', 'max' => 255],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator::className(), 'secret' => '6LdQvpcUAAAAABGeQ56NxTU6Ntla9sJU2ctc0_Gy', 'uncheckedMessage' => 'Please confirm that you are not a bot.']        ];
    }

    public function attributeLabels()
    {
        return [
            'city' => 'Город',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'reCaptcha' => 'reCaptcha',
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
        $user->username = $this->email;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->city = $this->city;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }

}