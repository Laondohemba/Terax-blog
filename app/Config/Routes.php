<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'PostController::index');

$routes->get('/user/create', 'UserController::create', ['filter' => 'noauth']);
$routes->get('/login', 'UserController::index', ['filter' => 'noauth']);
$routes->post('/login', 'UserController::login', ['filter' => 'noauth']);
$routes->post('user/create', 'UserController::store', ['filter' => 'noauth']);

$routes->get('user/dashboard', 'UserController::dashboard', ['filter' => 'auth']);
$routes->get('/logout', 'UserController::logout', ['filter' => 'auth']);
$routes->get('/posts/create', 'PostController::create', ['filter' => 'auth']);
$routes->post('/posts/create', 'PostController::store', ['filter' => 'auth']);
$routes->get('/posts/post/(:num)', 'PostController::show/$1', ['filter' => 'auth']);
$routes->get('/posts/update/(:num)', 'PostController::edit/$1', ['filter' => 'auth']);
$routes->post('/posts/update/(:num)', 'PostController::update/$1', ['filter' => 'auth']);
$routes->get('/posts/delete/(:num)', 'PostController::destroy/$1', ['filter' => 'auth']);
$routes->get('/posts/view/(:num)', 'PostController::view/$1');
$routes->post('/comments/store/(:num)', 'CommentController::store/$1');
$routes->post('/posts/like/(:any)', 'LikeController::store/$1', ['filter' => 'auth']);

