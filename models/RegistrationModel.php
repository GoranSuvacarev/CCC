<?php

namespace app\models;

use app\core\BaseModel;

class RegistrationModel extends BaseModel
{
    public int $id;
    public string $email = '';
    public string $passwordHash = '';

    public function tableName(): string
    {
        return 'users';
    }

    public function readColumns(): array
    {
        return ['id', 'email', 'passwordHash'];
    }

    public function editColumns()
    {
        return ['email', 'passwordHash'];
    }

    public function validationRules(): array
    {
        return [
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL, self::RULE_UNIQUE_EMAIL],
            "passwordHash" => [self::RULE_REQUIRED]
        ];
    }
}