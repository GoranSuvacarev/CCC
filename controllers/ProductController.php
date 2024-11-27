<?php

namespace app\controllers;

use app\core\Application;
use app\core\BaseController;
use app\core\PaginationHelper;
use app\models\CompareModel;
use app\models\FeatureModel;
use app\models\ProductModel;
use app\models\ViewCounterModel;

class ProductController extends BaseController
{
    public function search()
    {
        if (isset($_GET['term'])) {
            $model = new ProductModel();
            $term = $_GET['term'];

            // Basic query for first search box
            $query = "SELECT id, manufacturer, name, id_category 
                 FROM products 
                 WHERE CONCAT(manufacturer, ' ', name) LIKE '%$term%'";

            // Add category filter for second search box if category is provided
            if (isset($_GET['category'])) {
                $category = $_GET['category'];
                $query .= " AND id_category = $category";
            }

            $query .= " LIMIT 5";

            $results = $model->con->query($query);

            $suggestions = [];
            while ($row = $results->fetch_assoc()) {
                $suggestions[] = [
                    'id' => $row['id'],
                    'value' => $row['manufacturer'] . ' ' . $row['name'],
                    'category' => $row['id_category']
                ];
            }

            header('Content-Type: application/json');
            echo json_encode($suggestions);
            exit;
        }
    }

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
        $model->con->query("INSERT INTO views (id_products) VALUES ($model->id);");
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
        // Get the full product strings from the form
        $fullString1 = trim($_GET['name1']);
        $fullString2 = trim($_GET['name2']);

        // Extract just the product names by removing the manufacturer
        // Get the product data first
        $model = new CompareModel();
        $model->product1 = new ProductModel();
        $model->product2 = new ProductModel();

        // Query to get full product data including features
        $query = "SELECT p.*, pf.value, f.name as feature_name, f.measurement_units 
              FROM products p 
              LEFT JOIN products_feature pf ON p.id = pf.id_products 
              LEFT JOIN feature f ON pf.id_feature = f.id 
              WHERE p.name = ?";

        // For first product
        $stmt1 = $model->product1->con->prepare($query);
        if ($stmt1) {
            // Extract just the product name from the full string
            $nameParts1 = explode(' ', $fullString1, 2); // Split into max 2 parts
            $productName1 = $nameParts1[1] ?? $nameParts1[0]; // Use second part if exists, otherwise use full string

            $stmt1->bind_param("s", $productName1);
            $stmt1->execute();
            $result1 = $stmt1->get_result();

            if ($row = $result1->fetch_assoc()) {
                $model->product1->id = $row['id'];
                $model->product1->name = $row['name'];
                $model->product1->manufacturer = $row['manufacturer'];
                $model->product1->price = $row['price'];
                $model->product1->image = $row['image'];
                $model->product1->id_category = $row['id_category'];

                $model->product1->features = [];
                do {
                    if ($row['feature_name']) {
                        $model->product1->features[] = [
                            'name' => $row['feature_name'],
                            'value' => $row['value'],
                            'measurement_units' => $row['measurement_units']
                        ];
                    }
                } while ($row = $result1->fetch_assoc());
            }
        }

        // For second product
        $stmt2 = $model->product2->con->prepare($query);
        if ($stmt2) {
            // Extract just the product name from the full string
            $nameParts2 = explode(' ', $fullString2, 2); // Split into max 2 parts
            $productName2 = $nameParts2[1] ?? $nameParts2[0]; // Use second part if exists, otherwise use full string

            $stmt2->bind_param("s", $productName2);
            $stmt2->execute();
            $result2 = $stmt2->get_result();

            if ($row = $result2->fetch_assoc()) {
                $model->product2->id = $row['id'];
                $model->product2->name = $row['name'];
                $model->product2->manufacturer = $row['manufacturer'];
                $model->product2->price = $row['price'];
                $model->product2->image = $row['image'];
                $model->product2->id_category = $row['id_category'];

                $model->product2->features = [];
                do {
                    if ($row['feature_name']) {
                        $model->product2->features[] = [
                            'name' => $row['feature_name'],
                            'value' => $row['value'],
                            'measurement_units' => $row['measurement_units']
                        ];
                    }
                } while ($row = $result2->fetch_assoc());
            }
        }

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