<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL);


$router->group(null);

$router->namespace("App\Http\Controllers");

$router->get('/', "ChatController:home");
$router->post("/chat", "ChatController:sendMessage");

// var_dump($router);

$router->dispatch();

/*
 * Redirect all errors
 */
if ($router->error()) {
    $router->redirect("/error/{$router->error()}");
}
