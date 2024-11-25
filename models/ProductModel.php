<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DbConnection;

class ProductModel extends BaseModel
{
    public int $id;
    public string $name = '';
    public string $image = '';
    public int $price;

    public function tableName()
    {
        return "products";
    }

    public function readColumns()
    {
        return ["id", "name", "price","image"];
    }

    public function editColumns()
    {
        return ["name", "price", "image"];
    }

    public function validationRules(): array
    {
        return [
            "name" => [self::RULE_REQUIRED],
            "price" => [self::RULE_REQUIRED],
        ];
    }
}