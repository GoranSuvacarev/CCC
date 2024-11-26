<?php

namespace app\controllers;

use app\core\Application;
use app\core\BaseController;
use app\models\CompareModel;
use app\models\FeatureModel;
use app\models\ProductModel;

class ProductController extends BaseController
{


    public function ssds()
    {
        $model = new ProductModel();

        $results = $model->all("where id_category = 3");

        $this->view->render('ssds', 'main', $results);
    }

    public function gpus()
    {
        $model = new ProductModel();

        $results = $model->all("where id_category = 1");

        $this->view->render('gpus', 'main', $results);
    }

    public function gpu()
    {
        $model = new ProductModel();

        $model->mapData($_GET);

        $model->one("where id = $model->id");

        $this->view->render('gpu', 'main', $model);
    }

    public function cpus()
    {
        $model = new ProductModel();

        $results = $model->all("where id_category = 2");

        $this->view->render('cpus', 'main', $results);
    }

    public function compare()
    {
        $model = new CompareModel();
        $model->product1 = new ProductModel();
        $model->product1->one("where id = $_GET[id1]");
        $model->product2 = new ProductModel();

        $this->view->render('compare', 'main', $model);
    }

    public function update()
    {
        $model = new ProductModel();

        $model->mapData($_GET);

        $model->one("where id = $model->id");

        $this->view->render('updateProduct', 'main', $model);
    }

    public function addGPU()
    {
        $this->view->render('addGPU', 'main', null);
    }

    public function addCPU()
    {
        $this->view->render('addCPU', 'main', null);
    }

    public function addSSD()
    {
        $this->view->render('addSSD', 'main', null);
    }

    public function deleteProduct()
    {
        $modelF = new FeatureModel();
        $modelP = new ProductModel();
        $modelP->mapData($_GET);
        $modelF->delete("where id_products = $modelP->id ");
        $modelP->delete("where id = $modelP->id");
        if($modelP->id_category == 1){
            header("location:" . "/gpus");
        }
        if($modelP->id_category == 2){
            header("location:" . "/cpus");
        }
        if($modelP->id_category == 3){
            header("location:" . "/ssds");
        }
    }

    public function processAddGPU()
    {
        $modelP = new ProductModel();
        $product = array_slice($_POST, 0,3);
        $product['id_category'] = 1;
        $modelP->mapData($product);
        $modelP->validate();
        $modelP->insert();

        $features = array_slice($_POST, 3,10);
        $newID = $modelP->all("ORDER BY id DESC LIMIT 1;")[0]["id"] + 0;

        $featureCounter = 1;
        foreach ($features as $feature) {
            $modelF = new FeatureModel();
            $array = [];
            $array["value"] = $feature;
            var_dump($newID);
            $array["id_products"] = $newID;
            $array["id_feature"] = $featureCounter;
            $featureCounter++;
            $modelF->mapData($array);
            $modelF->validate();
            $modelF->insert();
        }

        Application::$app->session->set('successNotification', 'Bravo!');

        header("location:" . "/gpus");
    }

    public function processAddCPU()
    {
        $modelP = new ProductModel();
        $product = array_slice($_POST, 0,3);
        $product['id_category'] = 2;
        $modelP->mapData($product);
        $modelP->validate();
        $modelP->insert();

        $features = array_slice($_POST, 3,14);
        $newID = $modelP->all("ORDER BY id DESC LIMIT 1;")[0]["id"] + 0;

        $featureCounter = 8;
        foreach ($features as $feature) {
            $modelF = new FeatureModel();
            $array = [];
            $array["value"] = $feature;
            var_dump($newID);
            $array["id_products"] = $newID;
            $array["id_feature"] = $featureCounter;
            $featureCounter++;
            $modelF->mapData($array);
            $modelF->validate();
            $modelF->insert();
        }

        Application::$app->session->set('successNotification', 'Bravo!');

        header("location:" . "/cpus");
    }

    public function processAddSSD()
    {
        $modelP = new ProductModel();
        $product = array_slice($_POST, 0,3);
        $product['id_category'] = 3;
        $modelP->mapData($product);
        $modelP->validate();
        $modelP->insert();

        $features = array_slice($_POST, 3,10);

        $newID = $modelP->all("ORDER BY id DESC LIMIT 1;")[0]["id"] + 0;

        $featureCounter = 19;
        foreach ($features as $feature) {
            $modelF = new FeatureModel();
            $array = [];
            $array["value"] = $feature;
            $array["id_products"] = $newID;
            $array["id_feature"] = $featureCounter;
            $featureCounter++;
            $modelF->mapData($array);
            $modelF->validate();
            $modelF->insert();
        }

        Application::$app->session->set('successNotification', 'Bravo!');

        header("location:" . "/ssds");
    }

    public function processDelete()
    {
        $model = new ProductModel();

        $model->mapData($_POST);

        $model->validate();

        $model->update("where id = $model->id");

        Application::$app->session->set('successNotification', 'Uspesna promena!');

        header("location:" . "/products");
    }

    public function processUpdate()
    {
        $model = new ProductModel();

        $model->mapData($_POST);

        $model->validate();

        if ($model->errors) {
            Application::$app->session->set('errorNotification', 'Neuspesna promena!');
            $this->view->render('updateProduct', 'catalogue', $model);
            exit;
        }

        $model->update("where id = $model->id");

        Application::$app->session->set('successNotification', 'Uspesna promena!');

        header("location:" . "/products");
    }

    public function accessRole(): array
    {
        return [];
    }
}