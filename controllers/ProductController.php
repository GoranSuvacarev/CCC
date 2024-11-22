<?php

namespace app\controllers;

use app\core\Application;
use app\core\BaseController;
use app\models\ProductModel;

class ProductController extends BaseController
{

    public function products()
    {
        $model = new ProductModel();

        $results = $model->all("where id_category = 3");

        $this->view->render('products', 'list', $results);
    }

    public function update()
    {
        $model = new ProductModel();

        $model->mapData($_GET);

        $model->one("where id = $model->id");

        $this->view->render('updateProduct', 'list', $model);
    }

    public function processUpdate()
    {
        $model = new ProductModel();

        $model->mapData($_POST);

        $model->validate();

        if ($model->errors) {
            Application::$app->session->set('errorNotification', 'Neuspesna promena!');
            $this->view->render('updateProduct', 'list', $model);
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