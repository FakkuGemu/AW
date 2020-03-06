<?php
require '../vendor/autoload.php';
require '../Router.php';
require '../Flash.php';

session_start();
Flash::init();
$router = new Router();


$router->get('/image/new', 'ImageController::nowy');
$router->post('/image', 'ImageController::add');
$router->get('/images', 'ImageController::index');

$router->get('/search', 'ImageController::search');
$router->get('/gethint.php?q=', 'ImageController::nowy');


$router->get('/register', 'UserController::nowy');
$router->post('/register/new', 'UserController::add');

$router->get('/login', 'UserController::login_view');
$router->post('/login', 'UserController::authentication');

$router->post('/logout', 'UserController::logout');





$router->_404('ErrorController::_404');

$view =$router->dispatch();
$view->render();