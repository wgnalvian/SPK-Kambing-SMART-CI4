<?php

namespace Config;

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
$routes->get('/', 'Auth::index');
$routes->group('', ['filter' => 'loginfilter'], function ($routes) {
    $routes->get('/register', 'Auth::register');
    $routes->post('/register', 'Auth::registerAction');
    $routes->get('/login', 'Auth::login');
    $routes->post('/login', 'Auth::loginAction');
});

$routes->group('', ['filter' => 'authfilter'], function ($routes) {
    $routes->get('/category', 'Home::category');
    $routes->get('/subcategory', 'Home::subcategory');
    $routes->group('', ['filter' => 'adminarea'], function ($routes) {
        $routes->get('/category/delete', 'Home::deleteCategory');
        $routes->get('/category/add', 'Home::addCategoryView');
        $routes->post('/category/add', 'Home::addCategory');
        $routes->get('/subcategory/add', 'Home::addSubCategoryView');
        $routes->post('/subcategory/add', 'Home::addSubCategory');
    });


    $routes->get('/home', 'Home::index');
    $routes->get('/petunjuk', 'Auth::petunjuk');
    $routes->get('/spk/data/delete', 'Smart::deleteDataChoosen');
    $routes->get('/spk', 'Smart::index');
    $routes->post('/spk', 'Smart::chooseDataAction');
    $routes->get('/spk/data', 'Smart::dataChoosen');
    $routes->get('/spk/final', 'Smart::spkCount');
    $routes->get('/cempty', 'Smart::cempty');
    $routes->get('/logout', 'Auth::logout');
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
