<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Login::index');
$routes->get('logout', 'Login::logout');

// dashboard group
$routes->group('dashboard', ['namespace' => 'App\Controllers\Dashboard'], function ($routes) {
  $routes->get('/', 'Home::index');
  $routes->get('agen', 'Agen::index');
  $routes->get('agen/(:any)', 'Agen::$1');
});