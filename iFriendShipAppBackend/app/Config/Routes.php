<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


/** 
 * all api routes 
 * url structure : http://localhost:8080/api/$routes
*/

use App\Controllers\UserApiController;
use App\Controllers\AdminPagesController;
use App\Controllers\ServerStatusController;




/*
******************************
All Users API Route
********************************
*/

$routes->group('api/v1',  static function ($routes) {
    
    // Options Handler
    $routes->options('(:any)', 'BaseController::optionsHandler');
    // User Routes 
    $routes->get('server-status', 'ServerStatusController::index');
    $routes->post('create-user', 'UserApiController::createUser');
    $routes->get('verify-email/(:segment)', 'UserApiController::verifyEmail/$1');
    // Email Verification: If a user forget to verify email during registration process
    $routes->post('email-verification', 'UserApiController::emailVerification');

    $routes->post('login', 'AuthController::login');
    $routes->get('show-user/(:num)', 'UserApiController::showUser/$1');
    $routes->post('update-user/(:num)', 'UserApiController::updateUser/$1');
    $routes->post('upload-profile-photo/(:num)', 'UserApiController::uploadProfilePhoto/$1');
    $routes->put('delete-user/(:num)', 'UserApiController::softDeleteUser/$1');
    // forget password 
    $routes->post('forget-password', 'UserApiController::forgetPassword');
    // change password 
    $routes->post('change-password/(:segment)', 'UserApiController::changePassword/$1');
    // update password
    $routes->post('update-password/(:num)', 'UserApiController::updatePassword/$1');

    // get all friendship questions
    $routes->get('friendship-questions-2024', 'FriendshipQuestionController::NovemberFriendshipQuestions2024');

    // get user data 
    $routes->get('get-user-data/(:num)', 'UserApiController::getUser/$1');

    // insert form response data 

    $routes->post('insert-form-response/(:num)', 'FormApiController::insertData/$1');

    /* Get all for responses for a authenticated user
    * Url pattern: all-form-responses?userId=12&formId=55&page=1&limit=10&order=DESC
    */
    $routes->post('all-form-responses', 'FormApiController::getAllFormData');

    // get user form hit count

    $routes->get('form-hit-count/(:num)', 'ServerStatusController::formHitCount/$1');

    /*
    ******************************
     Admin API Route
    ********************************
    */

    $routes->post('admin/get-all-users/(:num)', 'AdminApiController::getUsers/$1');
    
    /* url pattern for update user details
    * req_type means request type : 1(update email and name), 2(block a user for a certain time), 3(hard delete)
    * admin/update-user-details?admId=admin&req_type=2&uid=userId
    */

    $routes->post('admin/update-user-details', 'AdminApiController::updateUserDetails');

     /* url pattern for update user details
    * req_type means request type : 1(get form responses of one user), 2(get one form resposne), 3(update one form resposne), 4( delete one form resposne)
    * admin/form-actions?admId=admin&req_type=2&formId=form_id&userId
    */

    // for getting all form response of a user url will be 
    //  admin/form-actions?admId=admin&req_type=2&formId=form_id&page=1&limit=10&order=DESC

    // If get one form response for a particular user then responseId will be send
    // admin/form-actions?admId=admin&req_type=2&formId=form_id&responseId=res_id

    // please note: pass userId for each request


    $routes->post('admin/form-actions', 'AdminApiController::formActions');


});






