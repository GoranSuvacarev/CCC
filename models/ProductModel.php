<?php

namespace app\models;

use app\core\BaseModel;
use app\core\DbConnection;

class ProductModel extends BaseModel
{
    public int $id;
    public string $name = '';
    public string $image = '';
    public string $price = '';
    public int $id_category;

    public function tableName()
    {
        return "products";
    }

    public function readColumns()
    {
        return ["id", "name", "price","image","id_category"];
    }

    public function editColumns()
    {
        return ["name", "price", "image","id_category"];
    }

    public function validationRules(): array
    {
        return [
            "name" => [self::RULE_REQUIRED],
            "price" => [self::RULE_REQUIRED],
        ];
    }
}