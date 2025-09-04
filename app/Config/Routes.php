<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('tentang', 'Home::tentang');
$routes->get('agen', 'Home::agen');
$routes->get('kontak', 'Home::kontak');

$routes->get('jual', 'Jual::index');
$routes->get('sewa', 'Sewa::index');
$routes->get('artikel', 'Artikel::index');

$routes->get('login', 'Login::index');
$routes->get('logout', 'Login::logout');

// dashboard group
$routes->group('dashboard', ['namespace' => 'App\Controllers\Dashboard'], function ($routes) {
  $routes->get('/', 'Home::index');
  $routes->get('laporan-penjualan', 'Laporan::index');

  $routes->group('properti', ['namespace' => 'App\Controllers\Dashboard\Properti'], function ($routes) {
    $routes->get('/', 'Properti::index');
    $routes->get('create', 'Properti::create');
    $routes->get('(:num)', 'Properti::detail/$1');
    $routes->post('store', 'Properti::store');
    $routes->post('update/(:num)', 'Properti::update/$1');
    $routes->post('favorite/(:num)', 'Properti::favorite/$1');
    $routes->post('sell/(:num)', 'Properti::sell/$1');
    $routes->post('validation/(:num)', 'Properti::validation/$1');
    $routes->get('delete/(:num)', 'Properti::delete/$1');
  });

  $routes->group('artikel', ['namespace' => 'App\Controllers\Dashboard\Artikel'], function ($routes) {
    $routes->get('/', 'Artikel::index');
    $routes->get('(:num)', 'Artikel::detail/$1');
    $routes->post('store', 'Artikel::store');
    $routes->post('update/(:num)', 'Artikel::update/$1');
    $routes->get('delete/(:num)', 'Artikel::delete/$1');
  });

  $routes->group('kategori', ['namespace' => 'App\Controllers\Dashboard\Kategori'], function ($routes) {
    $routes->get('/', 'Kategori::index');
    $routes->get('(:num)', 'Kategori::detail/$1');
    $routes->post('store', 'Kategori::store');
    $routes->post('update/(:num)', 'Kategori::update/$1');
    $routes->get('disabled/(:num)', 'Kategori::disabled/$1');
  });

  $routes->group('agen', ['namespace' => 'App\Controllers\Dashboard\Agen'], function ($routes) {
    $routes->get('/', 'Agen::index');
    $routes->get('(:num)', 'Agen::detail/$1');
    $routes->post('store', 'Agen::store');
    $routes->post('update/(:num)', 'Agen::update/$1');
    $routes->get('disabled/(:num)', 'Agen::disabled/$1');
  });

  $routes->group('user', ['namespace' => 'App\Controllers\Dashboard\User'], function ($routes) {
    $routes->get('/', 'User::index');
    $routes->post('store', 'User::store');
    $routes->post('update/(:num)', 'User::update/$1');
    $routes->post('disabled/(:num)', 'User::disabled/$1');
  });

  $routes->group('setting', ['namespace' => 'App\Controllers\Dashboard\Setting'], function ($routes) {
    $routes->get('/', 'Setting::index');
    $routes->post('update/(:num)', 'Setting::update/$1');
    $routes->post('password/(:num)', 'Setting::password/$1');
  });
});