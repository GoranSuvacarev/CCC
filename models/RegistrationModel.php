<?php

namespace app\models;

use app\core\BaseModel;

class RegistrationModel extends BaseModel
{
    public int $id;
    public string $email = '';
    public string $username = '';
    public string $passwordHash = '';
    public int $id_roles = 2;

    public function tableName(): string
    {
        return 'users';
    }

    public function readColumns(): array
    {
        return ['id', 'email', 'passwordHash','username'];
    }

    public function editColumns()
    {
        return ['email', 'passwordHash', 'id_roles', 'username'];
    }

    public function validationRules(): array
    {
        return [
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL, self::RULE_UNIQUE_EMAIL],
            "passwordHash" => [self::RULE_REQUIRED],
            "username" => [self::RULE_REQUIRED]
        ];
    }
}