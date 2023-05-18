<?php
declare(strict_types = 1);

use App\Controllers\HomeController;
use App\Core\App;
use App\Core\Config;
use App\Core\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

define('VIEW_PATH', __DIR__ . '/../views');

$router = new Router();

$router
    ->get('/', [HomeController::class, 'list'])
    ->post('/create', [HomeController::class, 'create'])
    ->post('/update', [HomeController::class, 'update'])
    ->post('/delete', [HomeController::class, 'delete']);

(new App(
    $router,
    ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
    new Config($_ENV)
))->run();