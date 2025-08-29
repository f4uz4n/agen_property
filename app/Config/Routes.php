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

  $routes->get('properti', 'Properti::index');
  $routes->get('properti/(:any)', 'Properti::$1');
  $routes->post('properti/store', 'Properti::store');
  $routes->post('properti/update/(:num)', 'Properti::update/$1');
  $routes->get('properti/delete/(:num)', 'Properti::delete/$1');

  $routes->get('agen', 'Agen::index');
  $routes->get('agen/(:any)', 'Agen::$1');
  $routes->post('agen/store', 'Agen::store');
  $routes->post('agen/update/(:num)', 'Agen::update/$1');
  $routes->get('agen/delete/(:num)', 'Agen::delete/$1');

  $routes->get('kategori', 'Kategori::index');
  $routes->get('kategori/(:any)', 'Kategori::$1');
  $routes->post('kategori/store', 'Kategori::store');
  $routes->post('kategori/update/(:num)', 'Kategori::update/$1');
  $routes->get('kategori/delete/(:num)', 'Kategori::delete/$1');

  $routes->get('artikel', 'Artikel::index');
  $routes->get('artikel/(:any)', 'Artikel::$1');
  $routes->post('artikel/store', 'Artikel::store');
  $routes->post('artikel/update/(:num)', 'Artikel::update/$1');
  $routes->get('artikel/delete/(:num)', 'Artikel::delete/$1');

  $routes->get('user', 'User::index');
  $routes->get('user/(:any)', 'User::$1');
  $routes->post('user/store', 'User::store');
  $routes->post('user/update/(:num)', 'User::update/$1');
  $routes->get('user/delete/(:num)', 'User::delete/$1');
});