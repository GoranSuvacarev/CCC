<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DbConnection;

class UserModel extends BaseModel
{
    public int $id;
    public string $username= '';

    public string $email = '';

    public int $id_role = 2;

    public function tableName(): string
    {
        return "users";
    }

    public function readColumns(): array
    {
        return ["id", "email" ,"username"];
    }

    public function editColumns(): array
    {
        return ["email", "username"];
    }

    public function validationRules(): array
    {
        return [
            "email" => [self::RULE_REQUIRED, self::RULE_EMAIL],
        ];
    }
}