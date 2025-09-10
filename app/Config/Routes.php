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
$routes->post('user_login', 'Login::process');
$routes->get('logout', 'Login::logout');

$routes->get('unauthorized', 'Error::unauthorized');
$routes->get('not-found', 'Error::notfound');

// dashboard group
$routes->group('dashboard', ['namespace' => 'App\Controllers\Dashboard', 'filter' => 'auth'], function ($routes) {
  $routes->get('/', 'Home::index');
  $routes->get('laporan-penjualan', 'Laporan::index');

  $routes->group('properti', function ($routes) {
    $routes->get('/', 'Properti::index');
    $routes->post('get_ajax', 'Properti::get_ajax');
    $routes->get('create', 'Properti::create');
    $routes->post('store', 'Properti::store');
    $routes->get('(:num)', 'Properti::detail/$1');
    $routes->post('update/(:num)', 'Properti::update/$1');
    $routes->post('favorite/(:num)', 'Properti::favorite/$1');
    $routes->post('disabled/(:num)', 'Properti::disabled/$1');
    $routes->post('delete/(:num)', 'Properti::delete/$1');
  });

  $routes->group('transaksi', function ($routes) {
    $routes->get('/', 'Transaksi::index');
    $routes->post('store', 'Transaksi::store');
    $routes->post('get_ajax', 'Transaksi::get_ajax');
    $routes->post('update/(:num)', 'Transaksi::update/$1');
    $routes->post('validasi/(:num)', 'Transaksi::validasi/$1');
    $routes->post('delete/(:num)', 'Transaksi::delete/$1');
  });

  $routes->group('artikel', function ($routes) {
    $routes->get('/', 'Artikel::index');
    $routes->post('get_ajax', 'Artikel::get_ajax');
    $routes->get('create', 'Artikel::create');
    $routes->get('(:num)', 'Artikel::detail/$1');
    $routes->post('store', 'Artikel::store');
    $routes->post('update/(:num)', 'Artikel::update/$1');
    $routes->post('delete/(:num)', 'Artikel::delete/$1');
  });

  $routes->group('kategori', function ($routes) {
    $routes->get('/', 'Kategori::index');
    $routes->post('store', 'Kategori::store');
    $routes->get('(:num)', 'Kategori::detail/$1');
    $routes->post('update/(:num)', 'Kategori::update/$1');
    $routes->post('disabled/(:num)', 'Kategori::disabled/$1');
  });

  $routes->group('agen', function ($routes) {
    $routes->get('/', 'Agen::index');
    $routes->post('store', 'Agen::store');
    $routes->get('(:num)', 'Agen::detail/$1');
    $routes->post('update/(:num)', 'Agen::update/$1');
    $routes->post('disabled/(:num)', 'Agen::disabled/$1');
  });

  $routes->group('user', ['filter' => 'auth:admin,owner'], function ($routes) {
    $routes->get('/', 'User::index');
    $routes->post('store', 'User::store');
    $routes->post('update/(:num)', 'User::update/$1');
    $routes->post('disabled/(:num)', 'User::disabled/$1');
  });

  $routes->group('setting', function ($routes) {
    $routes->get('/', 'Setting::index');
    $routes->post('update/(:num)', 'Setting::update/$1');
    $routes->post('password/(:num)', 'Setting::password/$1');
  });

  $routes->group('kontak', function ($routes) {
    $routes->get('/', 'Contact::index');
    $routes->post('update', 'Contact::update');
  });
});