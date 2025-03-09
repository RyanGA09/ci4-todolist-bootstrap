<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/tasks', 'TaskController::index');
$routes->post('/tasks/create', 'TaskController::create');
$routes->get('/tasks/delete/(:num)', 'TaskController::delete/$1');
