<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DbConnection;

class ProductModel extends BaseModel
{
    public int $id;
    public string $name = '';
    public string $description = '';
    public int $price;

    public function tableName()
    {
        return "products";
    }

    public function readColumns()
    {
        return ["id", "name", "price"];
    }

    public function editColumns()
    {
        return ["name", "price"];
    }

    public function validationRules(): array
    {
        return [
            "name" => [self::RULE_REQUIRED],
            "price" => [self::RULE_REQUIRED],
        ];
    }
}