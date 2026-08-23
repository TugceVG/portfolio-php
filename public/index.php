<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/../src/Router.php';
require_once __DIR__ . '/../src/Repositories/UserRepository.php';
require_once __DIR__ . '/../src/Services/AuthService.php';
require_once __DIR__ . '/../src/Controllers/LoginController.php';
require_once __DIR__ . '/../src/Controllers/HomeController.php';
require_once __DIR__ . '/../src/Database.php';

$router = new Router();
$homeController = new HomeController();
$db = new Database();
$pdo = $db->getConnection();
$userRepository = new UserRepository($pdo);
$authService = new AuthService($userRepository);
$loginController = new LoginController($authService);

$router->get('/', function () use ($homeController) {
    $homeController->home();
});

$router->get('/login', function () use ($loginController) {
   $loginController->show();
});

$router->post('/login', function () use ($loginController) {
    $loginController->authenticate();
});

$router->get('/test', function () {
    echo "Test route çalıştı!";
});

$router->dispatch();