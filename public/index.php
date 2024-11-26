<?php

require_once __DIR__ . "/../vendor/autoload.php";

use app\controllers\AuthController;
use app\controllers\HomeController;
use app\controllers\ProductController;
use app\controllers\SuggestionController;
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
$app->router->get("/deleteUser", [UserController::class, 'deleteUser']);

//Products
$app->router->get("/ssds", [ProductController::class, 'ssds']);
$app->router->get("/gpus", [ProductController::class, 'gpus']);
$app->router->get("/cpus", [ProductController::class, 'cpus']);
$app->router->get("/product", [ProductController::class, 'product']);
$app->router->get("/updateProduct", [ProductController::class, 'update']);
$app->router->post("/processUpdateProduct", [ProductController::class, 'processUpdate']);
$app->router->get("/addGPU", [ProductController::class, 'addGPU']);
$app->router->post("/processAddGPU", [ProductController::class, 'processAddGPU']);
$app->router->get("/addCPU", [ProductController::class, 'addCPU']);
$app->router->get("/addSSD", [ProductController::class, 'addSSD']);
$app->router->post("/processAddCPU", [ProductController::class, 'processAddCPU']);
$app->router->post("/processAddSSD", [ProductController::class, 'processAddSSD']);
$app->router->get("/deleteProduct", [ProductController::class, 'deleteProduct']);
$app->router->post("/compare", [ProductController::class, 'compare']);


//Auth
$app->router->get("/registration", [AuthController::class, 'registration']);
$app->router->post("/processRegistration", [AuthController::class, 'processRegistration']);
$app->router->get("/login", [AuthController::class, 'login']);
$app->router->get("/processLogout", [AuthController::class, 'processLogout']);
$app->router->get("/accessDenied", [AuthController::class, 'accessDenied']);
$app->router->post("/processLogin", [AuthController::class, 'processLogin']);

//Reports
$app->router->get("/myReports", [ReportController::class, 'myReports']);
$app->router->get("/getSuggestionsPerProduct", [ReportController::class, 'getSuggestionsPerProduct']);

//Suggestions
$app->router->post("/addSuggestion", [SuggestionController::class, 'addSuggestion']);

$app->run();