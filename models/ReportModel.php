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
            $this->from = "2024-11-1";
        }

        if (!$this->to || $this->to == '') {
            $this->to = "2025-11-30";
        }

        $dbResult = $this->con->query("SELECT COUNT(NAME) as 'counter',name FROM product_suggestions WHERE DATE(suggestion_time) BETWEEN '$this->from' AND '$this->to' GROUP BY name;");

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);
    }

    public function getViewsPerGPU()
    {
        if (!$this->from || $this->from == '') {
            $this->from = "2024-1-1";
        }

        if (!$this->to || $this->to == '') {
            $this->to = "2025-1-1";
        }

        $dbResult = $this->con->query("SELECT 
    COUNT(views.id_products) AS counter, 
    products.name 
FROM 
    views 
LEFT JOIN 
    products 
ON 
    views.id_products = products.id 
WHERE 
    DATE(views.view_time) BETWEEN '$this->from' AND '$this->to' 
    AND products.id_category = 1
GROUP BY 
    views.id_products, products.name;");

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);
    }

    public function getViewsPerCPU()
    {
        if (!$this->from || $this->from == '') {
            $this->from = "2024-1-1";
        }

        if (!$this->to || $this->to == '') {
            $this->to = "2025-1-1";
        }

        $dbResult = $this->con->query("SELECT 
    COUNT(views.id_products) AS counter, 
    products.name 
FROM 
    views 
LEFT JOIN 
    products 
ON 
    views.id_products = products.id 
WHERE 
    DATE(views.view_time) BETWEEN '$this->from' AND '$this->to' 
    AND products.id_category = 2
GROUP BY 
    views.id_products, products.name;");

        $resultArray = [];

        while ($result = $dbResult->fetch_assoc()) {
            $resultArray[] = $result;
        }

        echo json_encode($resultArray);
    }

    public function getViewsPerSSD()
    {
        if (!$this->from || $this->from == '') {
            $this->from = "2024-1-1";
        }

        if (!$this->to || $this->to == '') {
            $this->to = "2025-1-1";
        }

        $dbResult = $this->con->query("SELECT 
    COUNT(views.id_products) AS counter, 
    products.name 
FROM 
    views 
LEFT JOIN 
    products 
ON 
    views.id_products = products.id 
WHERE 
    DATE(views.view_time) BETWEEN '$this->from' AND '$this->to' 
    AND products.id_category = 3
GROUP BY 
    views.id_products, products.name;");

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