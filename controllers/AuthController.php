<?php

namespace app\controllers;

use app\core\Application;
use app\core\BaseController;
use app\models\RegistrationModel;
use app\models\LoginModel;
use app\models\SessionUserModel;

class AuthController extends BaseController
{
    public function registration()
    {
        $this->view->render('registration', 'main', new RegistrationModel());
    }

    public function processRegistration()
    {
        $model = new RegistrationModel();

        $model->mapData($_POST);

        $model->validate();

        if ($model->errors) {
            Application::$app->session->set('errorNotification', 'Neuspesna registracija!');
            $this->view->render('registration', 'main', $model);
            exit;
        }

        $model->passwordHash = password_hash($model->passwordHash, PASSWORD_DEFAULT);

        $model->insert();

        Application::$app->session->set('successNotification', 'Uspesna registracija!');

        header("location:" . "/login");
    }

    public function login()
    {
        if (Application::$app->session->get('user')) {
            header("location:" . "/");
        }

        $this->view->render('login', 'main', new LoginModel());
    }

    public function processLogin()
    {
        $model = new LoginModel();

        $model->mapData($_POST);

        $model->validate();

        if ($model->errors) {
            $this->view->render('login', 'main', $model);
            exit;
        }

        $loginPassword = $model->passwordHash;

        $model->one("where email = '$model->email'");

        $verifyResult = password_verify($loginPassword, $model->passwordHash);

        if ($verifyResult) {
            $sessionUserModel = new SessionUserModel();
            $sessionUserModel->email = $model->email;

            Application::$app->session->set('user', $sessionUserModel->getSessionData());
            header("location:" . "/");
        }

        $model->passwordHash = $loginPassword;

        Application::$app->session->set('errorNotification', 'Neuspesan login!');

        $this->view->render('login', 'main', $model);
    }

    public function processLogout()
    {
        Application::$app->session->delete('user');
        header("location:" . "/");
    }

    public function accessDenied()
    {
        $this->view->render('accessDenied', 'main', null);
    }

    public function accessRole(): array
    {
        return [];
    }
}