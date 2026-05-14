<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/confederaciones', 'ConfederacionesController::index');
$routes->get('/confederaciones/create', 'ConfederacionesController::create');
$routes->post('/confederaciones/store', 'ConfederacionesController::store');
$routes->get('/confederaciones/edit/(:num)', 'ConfederacionesController::edit/$1');
$routes->post('/confederaciones/update/(:num)', 'ConfederacionesController::update/$1');
$routes->get('/confederaciones/delete/(:num)', 'ConfederacionesController::delete/$1');
