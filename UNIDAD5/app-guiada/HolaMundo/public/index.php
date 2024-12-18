<?php
/**
 * Haz un programa que muestre un mensaje de bienvenida en la página principal y un mensaje de despedida
 * @author Javier Ruiz Molero
 */
require_once "../app/Config/config.php";
require_once "../vendor/autoload.php";

use App\Core\Router;
use App\Controllers\IndexController;

$router = new Router();
$router->add(array(
    'name' => 'home',
    'path' => '/^\/$/',
    'action' => [IndexController::class, 'IndexAction']
));

$router->add(array(
    'name' => 'saludo',
    'path' => '/([a-zA-ZáéíóúÁÉÍÓÚñÑ0-9_-]+)$/',
    'action' => [IndexController::class, 'MessajeAction']
));

$router->add(array(
    'name' => 'numeros',
    'path' => '/^\/numeros\/$/',
    'action' => [IndexController::class, 'NumberParAction']
));

$router->add(array(
    'name' => 'pares',
    'path' => '/^\/numeros\/(\d+)$/',
    'action' => [IndexController::class, 'NumberParesAction']
));
$request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);

$route = $router->match($request);

if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    $controller = new $controllerName;
    $controller->$actionName($request);
} else {
    echo "No rute";
    var_dump($route);
}

?>
<a href="https://github.com/javierrm11/dwes/tree/main/UNIDAD5/app-guiada/HolaMundo">Enlace a repositorio</a>