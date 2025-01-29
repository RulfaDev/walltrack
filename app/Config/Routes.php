<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Landing::index');
$routes->get('/register', 'Auth::register', ['filter' => 'guest']);
$routes->post('/register', 'Auth::processRegister', ['filter' => 'guest']);
$routes->get('/login', 'Auth::login', ['filter' => 'guest']);
$routes->post('/login', 'Auth::processLogin', ['filter' => 'guest']);
$routes->get('/logout', 'Auth::logout', ['filter' => 'auth']);

$routes->group('', ['filter' => 'auth'], function ($routes) {
    // Dashboard
    $routes->get('/dashboard', 'Dashboard::index');
    // Categories
    $routes->get('/categories', 'Category::index');
    $routes->get('/categories/create', 'Category::create');
    $routes->post('/categories/store', 'Category::store');
    // Transaction
    $routes->get('/transactions', 'Transaction::index');
    $routes->get('/transactions/create', 'Transaction::create');
    $routes->post('/transactions/store', 'Transaction::store');
    // Profile
    $routes->get('/profile', 'User::profile');
});