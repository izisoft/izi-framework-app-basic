<?php
/**
 * @link https://framework.iziweb.net
 * @copyright Copyright (c) 2021 Izi Software LLC
 * @license https://framework.iziweb.net/license
 */

namespace app\models;

use izi\db\DbModel;
use izi\base\Model;
use izi\base\UserModel;

/**
 * Class User
 *
 * @package app\models
 * @author Giang A Tin <vantruong1898@gmail.com>
 * @since 1.0
 */
class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 10;
    const STATUS_DELETE = -5;

    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';
    public int $status = self::STATUS_INACTIVE;

    public function attributes(): array
    {
        return [
            'firstname', 'lastname', 'email', 'password','status'
        ];
    }

    public function labels(): array
    {
        return [
            'firstname' => 'First name',
            'lastname' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Confirm password'
        ];
    }

    public function tableName(): string
    {
        return 'users';
    }

    public function save(): bool
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
          'firstname' => [self::RULE_REQUIRED],
          'lastname' => [self::RULE_REQUIRED],
          'email' => [self::RULE_REQUIRED, self::RULE_EMAIL,
              [self::RULE_UNIQUE, 'class' => self::class, ]
          ],
          'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 6], [self::RULE_MAX, 'max' => 24]],
          'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function primaryKey(): string
    {
        return 'id';
    }

    public function getDisplayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}