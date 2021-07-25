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
class ContactForm extends Model
{
    public string $subject, $email, $body;

    /**
     * @return array[]
     */
    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'body' => [self::RULE_REQUIRED]
        ];
    }

    /**
     * @return array[]
     */
    public function labels(): array
    {
        return [
          'email' => 'Email',
          'subject' => 'Subject',
          'body' => 'Body',
        ];
    }

    public function send(): bool
    {
        return true;
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