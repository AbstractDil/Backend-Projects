<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dev/insert-user', 'DevController::insertUser');


$routes->group('', ['filter' => 'csrf'], static function ($routes) {

    // Auth
    $routes->get('/login', 'AuthController::loginForm');
    $routes->post('/login', 'AuthController::login');
    $routes->get('/logout', 'AuthController::logout');

    // MFA
    $routes->get('/mfa/setup', 'MfaController::setup');
    $routes->post('/mfa/verify-setup', 'MfaController::verifySetup');

    $routes->get('/mfa/challenge', 'MfaController::challenge');
    $routes->post('/mfa/verify-challenge', 'MfaController::verifyChallenge');

    // Protected
    $routes->get('/dashboard', 'DashboardController::index');
});
