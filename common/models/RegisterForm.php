<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class RegisterForm extends Model
{
    public $email;
    public $phone;
    public $password;
    public $passwordConfirm;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'phone', 'password', 'passwordConfirm'], 'required'],
            ['email', 'email'],
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if ($this->password != $this->passwordConfirm){
                $this->addError('password', 'Паролі не співпадають');
            }
        }
    }

    public function afterValidate()
    {
        parent::afterValidate();
        if (strlen($this->password) < 6){
            $this->addError('password', "Мінімальна довжина паролю - 6 символів");
        }
        if (($user = User::findByEmail($this->email)) != false){
            $this->addError('email', 'Користувач з такою поштою вже зареєстрований');
        }
    }

    public function attributeLabels()
    {
        return [
            'email' => 'Email',
            'password' => 'Пароль',
            'passwordConfirm' => 'Підтвердіть пароль',
            'phone' => 'Телефон'
        ];
    }

    /**
     *
     * @return bool|User
     */
    public function register()
    {
        if (!$this->validate()) {
            return false;
        }
        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->phone = $this->phone;
        $user->generateAuthKey();
        $user->username = $this->randomString();
        $user->status = User::STATUS_ACTIVE;
        $user->save();

        return $user;
    }

    private function randomString(){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring .= $characters[rand(0, strlen($characters)-1)];
        }
        return $randstring;
    }
}
