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

    public function getViewsPerGPU()
    {
        $model = new ReportModel();
        $model->mapData($_GET);
        $model->getViewsPerGPU();
    }

    public function getViewsPerCPU()
    {
        $model = new ReportModel();
        $model->mapData($_GET);
        $model->getViewsPerCPU();
    }

    public function getViewsPerSSD()
    {
        $model = new ReportModel();
        $model->mapData($_GET);
        $model->getViewsPerSSD();
    }

    public function accessRole()
    {
        return [];
    }
}