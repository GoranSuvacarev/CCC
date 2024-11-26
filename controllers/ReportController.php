<?php

namespace app\controllers;

use app\core\BaseController;
use app\models\ReportModel;

class ReportController extends BaseController
{
    public function getSuggestionsPerProduct()
    {
        $model = new ReportModel();
        $model->mapData($_GET);
        $model->getSuggestionsPerProduct();
    }

    public function accessRole()
    {
        return [];
    }
}