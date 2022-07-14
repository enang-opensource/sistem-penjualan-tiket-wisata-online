<?php

namespace Config;

use App\Controllers\AuthController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
  require SYSTEMPATH . 'Config/Routes.php';
}

/*
* --------------------------------------------------------------------
* Router Setup
* --------------------------------------------------------------------
*/
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
* --------------------------------------------------------------------
* Route Definitions
* --------------------------------------------------------------------
*/

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'GuestController::wisata');

// auth
$routes->add('login', 'AuthController::login');
$routes->add('login/process', 'AuthController::loginProcess');
$routes->add('register', 'AuthController::register');
$routes->add('register/process', 'AuthController::registerProcess');
$routes->add('logout', 'AuthController::logout');


//
$routes->add('admin', 'AuthController::login');
$routes->add('admin/login', 'AuthController::login');

// guest route
$routes->group('guest', ['namespace' => 'App\Controllers'], function ($subroutes) {
  $subroutes->group('', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('about', 'GuestController::about');
    $routes->add('kontak', 'GuestController::kontak');
  });

  // start wisata
  $subroutes->group('add_komentar', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('', 'GuestController::add_komentar');
  });
  // end wisata

  // start wisata
  $subroutes->group('wisata', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('', 'GuestController::wisata');
    $routes->add('wisata_detail/(:any)', 'GuestController::detail/$1');
  });
  // end wisata

  // start informasi
  $subroutes->group('informasi', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('', 'GuestController::informasi');
    $routes->add('informasi_detail/(:any)', 'GuestController::informasi_detail/$1');
  });
  // end informasi

  $subroutes->group('transaksi', function ($routes) {
    $routes->add('', 'GuestController::transaksi');
  });

  //starts midtrans
  $subroutes->group('midtrans', function ($routes) {
    $routes->add('', 'Snap::token');
    $routes->add('finish', 'Snap::finish');
    $routes->add('update', 'Notification::index');
  });
  //end midtrans
});

$routes->group('admin', ['namespace' => 'App\Controllers'], function ($subroutes) {

  //starts wisata
  $subroutes->group('index', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('', 'AdminController::index');
  });
  //end wisata

  //starts wisata
  $subroutes->group('wisata', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('', 'AdminController::add_wisata');
    $routes->add('insert', 'AdminController::add_wisata_proses');
    $routes->add('list', 'AdminController::list_wisata');
    $routes->add('update/(:any)', 'AdminController::update_wisata/$1');
    $routes->add('update_proses', 'AdminController::edit_wisata_proses');
    $routes->add('delete/(:any)', 'AdminController::delete_wisata/$1');
    $routes->add('delete_img/(:any)', 'AdminController::delete_img/$1');
  });
  //end wisata

  //starts informasi
  $subroutes->group('informasi', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('', 'AdminController::add_informasi');
    $routes->add('insert', 'AdminController::add_informasi_proses');
    $routes->add('list', 'AdminController::list_informasi');
    $routes->add('update/(:any)', 'AdminController::update_informasi/$1');
    $routes->add('update_proses', 'AdminController::edit_informasi_proses');
    $routes->add('delete/(:any)', 'AdminController::delete_informasi/$1');
  });
  //end informasi

  //starts tiket
  $subroutes->group('tiket', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('', 'AdminController::add_tiket');
    $routes->add('insert', 'AdminController::add_tiket_proses');
    $routes->add('list', 'AdminController::list_tiket');
    $routes->add('update/(:any)', 'AdminController::update_tiket/$1');
    $routes->add('update_proses', 'AdminController::edit_tiket_proses');
    $routes->add('delete/(:any)', 'AdminController::delete_tiket/$1');

  });
  //end tiket

  //starts users
  $subroutes->group('users', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('', 'AdminController::list_user');
  });
  //end users

  //starts transaksi
  $subroutes->group('transaksi', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->add('', 'AdminController::list_transaksi');
  });
  //end transaksi
});

/*
* --------------------------------------------------------------------
* Additional Routing
* --------------------------------------------------------------------
*
* There will often be times that you need additional routing and you
* need it to be able to override any defaults in this file. Environment
* based routes is one such time. require() additional route files here
* to make that happen.
*
* You will have access to the $routes object within that file without
* needing to reload it.
*/
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
  require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
