<?php

namespace app\models;

use app\core\BaseModel;

class SuggestionModel extends BaseModel
{
    public string $name = '';
    public string $source = '';
    public int $id_users ;

    public function tableName()
    {
        return "product_suggestions";
    }

    public function readColumns()
    {
        return ["id","name","source","id_users"];
    }

    public function editColumns()
    {
        return ["name","source","id_users"];
    }

    public function validationRules()
    {
        return [
            "name" => [self::RULE_REQUIRED],
        ];
    }
}