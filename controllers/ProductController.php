<?php

namespace app\controllers;

use app\core\Application;
use app\core\BaseController;
use app\core\PaginationHelper;
use app\models\CompareModel;
use app\models\FeatureModel;
use app\models\ProductModel;

class ProductController extends BaseController
{
    private function getPaginatedResults($categoryId) {
        $model = new ProductModel();

        // Get total count
        $countResult = $model->all("where id_category = $categoryId");
        $totalItems = count($countResult);

        // Get current page from URL parameter
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($currentPage < 1) $currentPage = 1;

        // Initialize pagination
        $pagination = new PaginationHelper($totalItems, 9, $currentPage);
        $offset = $pagination->getOffset();
        $limit = $pagination->getLimit();

        // Get paginated results
        $results = $model->all("where id_category = $categoryId LIMIT $limit OFFSET $offset");

        return [
            'items' => $results,
            'pagination' => $pagination
        ];
    }

    public function ssds()
    {
        $data = $this->getPaginatedResults(3);
        $this->view->render('ssds', 'main', $data);
    }

    public function gpus()
    {
        $data = $this->getPaginatedResults(1);
        $this->view->render('gpus', 'main', $data);
    }

    public function product()
    {
        $model = new ProductModel();
        $model->mapData($_GET);
        $model->one("where id = $model->id");

        // Get category name
        $categoryResult = $model->con->query(
            "SELECT c.name as category_name 
             FROM category c 
             WHERE c.id = $model->id_category"
        );
        $category = $categoryResult->fetch_assoc();

        // Get product features
        $featureModel = new FeatureModel();
        $features = $featureModel->con->query(
            "SELECT f.name, pf.value, f.measurement_units
             FROM products_feature pf
             JOIN feature f ON f.id = pf.id_feature
             WHERE pf.id_products = $model->id
             ORDER BY f.id"
        );

        $featureData = [];
        while ($feature = $features->fetch_assoc()) {
            $featureData[] = [
                'name' => $feature['name'],
                'value' => $feature['value'],
                'measurement_units' => $feature['measurement_units']
            ];
        }

        $viewData = [
            'product' => $model,
            'category' => $category['category_name'],
            'features' => $featureData
        ];

        $this->view->render('product', 'main', $viewData);
    }

    public function cpus()
    {
        $data = $this->getPaginatedResults(2);
        $this->view->render('cpus', 'main', $data);
    }

    public function compare()
    {
        var_dump($_POST);
        exit;
        $model = new CompareModel();
        $model->product1 = new ProductModel();

        $model->product1->one("where name = $_POST[id]");
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