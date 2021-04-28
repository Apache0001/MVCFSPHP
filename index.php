<?php
ob_start();
require __DIR__."./vendor/autoload.php";

use CoffeeCode\Router\Router;

$route =  new Router(url(), ":");


/**
 * Web Routes
 */

 $route->namespace('Source\Controllers');
 $route->get('/', 'Web:home');
 $route->get('/blog', 'Web:blog'); 

 /** Erro Routes */

$route->namespace('Source\Controllers')->group('/ops');
$route->get('/{errcode}', 'Web:error');


$route->dispatch();


if($route->error()){
    $route->redirect("/ops/{$route->error()}"); 
}

ob_end_flush();