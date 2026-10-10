<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Dashboard::index');
$routes->match(['get', 'post'], 'login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('dashboard', 'Dashboard::index');
    $routes->resource('products', ['controller' => 'Products', 'except' => 'show']);
    $routes->resource('customers', ['controller' => 'Customers', 'except' => 'show']);
    $routes->resource('staff', ['controller' => 'Staff', 'except' => 'show']);
    $routes->match(['get', 'post'], 'sales/create', 'Sales::create');
    $routes->get('sales', 'Sales::index');
});
