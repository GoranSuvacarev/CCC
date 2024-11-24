<?php

namespace app\controllers;

use app\core\Application;
use app\core\BaseController;
use app\models\SuggestionModel;

class SuggestionController extends BaseController
{

    public function accessRole()
    {
        return[];
    }

    public function addSuggestion()
    {
        $model = new SuggestionModel();

        $model->mapData($_POST);

        if ($model->id_users == 0) {
            Application::$app->session->set('errorNotification', 'You have to be logged in to add a suggestion!');
            $this->view->render('/home', 'main', $model);
            exit;
        }

        $model->validate();

        if ($model->errors) {
            Application::$app->session->set('errorNotification', 'Error');
            $this->view->render('/home', 'main', $model);
            exit;
        }


        $model->insert();

        Application::$app->session->set('successNotification', 'Suggestion sent');

        header("location:" . "/");
    }
}