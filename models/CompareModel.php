<?php

namespace app\models;

use app\core\BaseModel;

class CompareModel extends BaseModel
{

    public ProductModel $product1;
    public ProductModel $product2;

    public function tableName()
    {
        return "";
    }

    public function readColumns()
    {
        return [];
    }

    public function editColumns()
    {
        return [];
    }

    public function validationRules(): array
    {
        return [];
    }
}