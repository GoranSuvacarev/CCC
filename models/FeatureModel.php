<?php

namespace app\models;

use app\core\BaseModel;

class FeatureModel extends BaseModel
{
    public string $value = "";
    public int $id_products = 0;
    public int $id_feature = 0;

    public function tableName()
    {
        return "products_feature";
    }

    public function readColumns()
    {
        return ["id","value", "id_products", "id_feature"];
    }

    public function editColumns()
    {
        return["value", "id_products", "id_feature"];
    }

    public function validationRules()
    {
        return [];
    }
}