<?php
/**
 * @link https://framework.iziweb.net
 * @copyright Copyright (c) 2021 Izi Software LLC
 * @license https://framework.iziweb.net/license
 */

namespace app\models;

use izi\base\Application;
use izi\base\Model;

/**
 * Class LoginForm
 *
 * @package app\models
 * @author Giang A Tin <vantruong1898@gmail.com>
 * @since 1.0
 */
class LoginForm extends Model
{
    public string $email, $password;

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    /**
     * @return array[]
     */
    public function labels(): array
    {
        return [
          'email' => 'Email',
          'password' => 'Password'
        ];
    }

    public function login(): bool
    {
        $user = User::findOne(['email' => $this->email]);
        if(!$user){
            $this->addError('email', 'User does not exist with this email');
            return false;
        }
        if(!password_verify($this->password, $user->password)){
            $this->addError('password', 'Password is incorrect');
            return false;
        }

        return Application::$app->login($user);
    }
}