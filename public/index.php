<?php
// 1. Load Composer Autoloader
require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\HomeController;
// 2. Initialize Router
$router = new Router();

// 3. Define Routes
$router->get('/', [HomeController::class, 'index']);
$router->get('/about', function() {
    echo "This is the About Page";
});

// 4. Resolve / Dispatch Request
if (method_exists($router, 'resolve')) {
    $router->resolve();
} elseif (method_exists($router, 'dispatch')) {
    $router->dispatch();
} else {
    throw new BadMethodCallException('No valid dispatch method found on Router.');
}
