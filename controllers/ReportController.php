<?php

namespace app\controllers;

use app\core\BaseController;
use app\models\ReportModel;

class ReportController extends BaseController
{

    public function myReports(){
        $this->view->render("myReports","list",null);
    }

    /*
    public function getNumberOfReservationsPerMonth()
    {
        $model = new ReportModel();
        $model->getNumberOfReservationsPerMonth();
    }

    public function getPricePerMonth()
    {
        $model = new ReportModel();
        $model->getPricePerMonth();
    }
    */
    public function accessRole()
    {
        return [];
    }
}