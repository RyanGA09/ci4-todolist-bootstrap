<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('tasks', function ($routes) {
    $routes->get('/', 'TaskController::index');         // Menampilkan daftar tasks
    $routes->get('(:num)', 'TaskController::show/$1');  // Menampilkan task berdasarkan ID
    $routes->post('/', 'TaskController::create');       // Membuat task baru
    $routes->put('(:num)', 'TaskController::update/$1'); // Memperbarui task
    $routes->delete('(:num)', 'TaskController::delete/$1'); // Menghapus task
});
