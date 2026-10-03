<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Auth::index');

$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::login');

$routes->get('customers', 'CustomerAccounts::index', ['filter' => 'auth']);
$routes->get('customers/new', 'CustomerAccounts::create', ['filter' => 'auth']);
$routes->post('customers/store', 'CustomerAccounts::store', ['filter' => 'auth']);
$routes->get('customers/edit/(:num)', 'CustomerAccounts::edit/$1', ['filter' => 'auth']);
$routes->post('customers/update/(:num)', 'CustomerAccounts::update/$1', ['filter' => 'auth']);

$routes->get('users', 'UserAccounts::index', ['filter' => 'auth']);
$routes->get('users/new', 'UserAccounts::create', ['filter' => 'auth']);
$routes->post('users/store', 'UserAccounts::store', ['filter' => 'auth']);
$routes->get('users/edit/(:num)', 'UserAccounts::edit/$1', ['filter' => 'auth']);
$routes->post('users/update/(:num)', 'UserAccounts::update/$1', ['filter' => 'auth']);

$routes->get('logout', 'Auth::logout');