<?php

namespace app\models;

use app\core\Application;
use app\core\BaseModel;

class ReportModel extends BaseModel
{
    public string $from = '';
    public string $to = '';
        public function getSuggestionsPerProduct()
    {
        if (!$this->from || $this->from == '') {
            $this->from = "2024-01-01";
        }

        if (!$this->to || $this->to == '') {
            $this->to = "2025-01-01";
        }

        $dbResult = $this->con->query("SELECT COUNT(NAME) as 'counter',name FROM product_suggestions WHERE DATE(suggestion_time) BETWEEN '$this->from' AND '$this->to' GROUP BY name;");

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);
    }


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

    public function validationRules()
    {
        return [];
    }
}