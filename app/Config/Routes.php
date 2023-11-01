<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'MainController::index');
$routes->get('/admin', 'MainController::admin', ['filter'=>'authGuard']);
$routes->get('/login_form', 'MainController::login_form');
$routes->get('/logout', 'MainController::logout');
$routes->get('/signup_form', 'MainController::signup_form');
$routes->post('/signup', 'MainController::register');
$routes->post('/change_password', 'MainController::change_password');
$routes->post('/update_admin', 'MainController::update_admin', ['filter'=>'authGuard']);
$routes->post('/save_profile/(:any)', 'MainController::save_profile/$1');
$routes->post('/login', 'MainController::login');
$routes->post('/add_product', 'MainController::add_product', ['filter'=>'authGuard']);
$routes->post('/add_category', 'MainController::add_category', ['filter'=>'authGuard']);
$routes->get('/del_category/(:any)', 'MainController::del_category/$1', ['filter'=>'authGuard']);
$routes->get('/edit_product/(:any)', 'MainController::edit_product/$1', ['filter'=>'authGuard']);
$routes->get('/delete_product/(:any)', 'MainController::delete_product/$1', ['filter'=>'authGuard']);
$routes->post('/update_product/(:any)', 'MainController::update_product/$1', ['filter'=>'authGuard']);
$routes->get('/product/(:any)', 'MainController::view_product/$1');
$routes->get('/category/(:any)', 'MainController::category/$1');