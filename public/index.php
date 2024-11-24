<?php

require_once __DIR__ . "/../vendor/autoload.php";

use app\controllers\AuthController;
use app\controllers\HomeController;
use app\controllers\ProductController;
use app\controllers\UserController;
use app\controllers\ReportController;
use app\core\Application;

$app = new Application();

$app->router->get("/getUser", [UserController::class, 'readUser']);
$app->router->get("/", [HomeController::class, 'home']);

//Users
$app->router->get("/users", [UserController::class, 'readAll']);
$app->router->get("/updateUser", [UserController::class, 'updateUser']);
$app->router->get("/createUser", [UserController::class, 'createUser']);
$app->router->post("/processUpdateUser", [UserController::class, 'processUpdateUser']);
$app->router->post("/processCreateUser", [UserController::class, 'processCreate']);

//Products
$app->router->get("/products", [ProductController::class, 'products']);
$app->router->get("/updateProduct", [ProductController::class, 'update']);
$app->router->post("/processUpdateProduct", [ProductController::class, 'processUpdate']);

//Auth
$app->router->get("/registration", [AuthController::class, 'registration']);
$app->router->post("/processRegistration", [AuthController::class, 'processRegistration']);
$app->router->get("/login", [AuthController::class, 'login']);
$app->router->get("/processLogout", [AuthController::class, 'processLogout']);
$app->router->get("/accessDenied", [AuthController::class, 'accessDenied']);
$app->router->post("/processLogin", [AuthController::class, 'processLogin']);

//Reports
$app->router->get("/myReports", [ReportController::class, 'myReports']);
//$app->router->get("/getNumberOfReservationsPerMonth", [ReportController::class, 'getNumberOfReservationsPerMonth']);
//$app->router->get("/getPricePerMonth", [ReportController::class, 'getPricePerMonth']);

$app->run();