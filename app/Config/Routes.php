<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/tasks', 'TaskController::index');
$routes->post('/tasks/create', 'TaskController::create');
$routes->get('/tasks/delete/(:num)', 'TaskController::delete/$1');
$routes->get('/tasks/edit/(:num)', 'TaskController::edit/$1');

// ROUTES
// $routes->group('tasks', function($routes) {
//     $routes->get('/', 'TaskController::index');
//     $routes->get('(:num)', 'TaskController::show/$1');
//     $routes->post('/', 'TaskController::create');
//     $routes->put('(:num)', 'TaskController::update/$1');
//     $routes->delete('(:num)', 'TaskController::delete/$1');
// });