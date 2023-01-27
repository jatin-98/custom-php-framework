<?php

namespace App\Models;

use App\Core\Application;
use App\Core\Model;

class LoginModel extends Model
{

    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);

        if (!$user) {
            $this->addError('email', 'No User found with this email');
            return false;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is Incorrect');
            return false;
        }       

        Application::$app->login($user);
    }
}
