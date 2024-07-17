<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/** 
 * all api routes 
 * url structure : http://localhost:8080/api/$routes
*/
$routes->group('api', static function ($routes) {
    $routes->get('/', 'ApiController::index');
    $routes->post('create-user', 'ApiController::createUser');
    $routes->get('get-all-users', 'ApiController::index');
    $routes->get('show-user/(:num)', 'ApiController::showUser/$1');
    $routes->put('update-user/(:num)', 'ApiController::updateUser/$1');
    $routes->delete('delete-user/(:num)', 'ApiController::deleteUser/$1');
});
