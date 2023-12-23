<?php

use App\Controllers\CategoryController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AdminHome::index', ['filter'=>'noAuth']);
$routes->get('/products', 'Product::index');
$routes->get('/products/create', 'Product::create',  ['filter'=>'authGuard']);
$routes->post('/products/store', 'Product::store');
$routes->get('/products/delete/(:num)', 'Product::delete/$1',  ['filter'=>'authGuard']);
$routes->get('/products/edit/(:num)', 'Product::edit/$1',  ['filter'=>'authGuard']);
$routes->post('/products/update/(:num)', 'Product::update/$1',  ['filter'=>'authGuard']);

// signin/signup
$routes->get('signup', 'SignupController::index');

$routes->match(['get','post'],'signup/store', 'SignupController::store');
$routes->get('signin', 'SigninController::index');
$routes->post('login', 'SigninController::login');
$routes->get('signout', 'SigninController::logout');

//category routes
$routes->get('category', 'CategoryController::index',  ['filter'=>'authGuard']); //category list
$routes->get('category/create', 'CategoryController::create',  ['filter'=>'authGuard']); //category entry form
$routes->post('category/store', 'CategoryController::store',  ['filter'=>'authGuard']); //category save
$routes->get('category/edit/(:num)', 'CategoryController::edit/$1',  ['filter'=>'authGuard']); //category edit form
$routes->post('category/update/(:num)', 'CategoryController::update/$1',  ['filter'=>'authGuard']); //category edit 
$routes->get('category/delete/(:num)', 'CategoryController::delete/$1',  ['filter'=>'authGuard']); //category delete

//fronten

$routes->get('productsall', 'frontend\ProductController::index');
$routes->post ('product/(:num)', 'frontend\ProductController::show/$1');

// editor routes
$routes->get ('/editor', 'EditorController::index', ['filter'=>'noAuth']);
$routes->get ('/editor/products', 'EditorController::index', ['filter'=>'noAuth']);
