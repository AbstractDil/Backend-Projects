<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'pages/home';










// Student  Routes

$route['student/process_login']['post'] = 'Student/processlogin';
$route['student/profile'] = 'pages/profile';

$route['student/logout'] = 'student/logout';

$route['student/dashboard'] = 'pages/dashboard';

$route['student/payment-history'] = 'pages/payment_history';

$route['student/payment-receipt'] = 'pages/payment_receipt';


/*************** Admin Routes Start *****************/
$route['admin/login'] = 'admin_pages/admin_login';

$route['admin/process_login']['post'] = 'Auth/Admin_Login_Verify';

$route['admin/logout'] = 'Auth/logout';



$route['admin/dashboard'] = 'admin_pages/admin_dashboard';

/*Notice & Slider Routes*/

$route['admin/notice'] = 'admin_pages/notice';
$route['admin/notice/create'] = 'admin_crud/create_notice';
$route['admin/notice/edit/(:any)'] = 'admin_pages/edit_notice/$1';
$route['admin/notice/edit/confirm/(:any)'] = 'admin_crud/edit_notice_confirm/$1';
$route['admin/notice/delete/(:any)'] = 'admin_crud/delete_notice/$1';


/*Tuition Fees Routes*/

$route['admin/tuition-fees-table'] = 'admin_pages/tuition_fees_table';
$route['admin/view-receipt'] = 'admin_pages/view_receipt';
$route['admin/tuition-fees/create/(:any)'] ['post'] = 'admin_crud/create_tuition_fees/$1';
$route['admin/payment-details/edit'] = 'admin_pages/edit_payment';
$route['admin/payment-details/edit/confirm/(:any)/(:any)'] = 'admin_crud/edit_payment_confirm/$1/$2';
$route['admin/payment-details/delete/(:any)/(:any)'] = 'admin_crud/delete_payment/$1/$2';

$route['admin/student/make-payment/(:any)'] = 'admin_pages/make_payment/$1';

// Testing Routes

$route['admin/test'] = 'admin_pages/test';


/* Student Routes */
$route['admin/student'] = 'admin_pages/student';
$route['admin/student/create'] ['post'] = 'admin_crud/create_student';
$route['admin/student/view/(:any)'] ['get'] = 'admin_pages/view_student/$1';
$route['admin/student/edit/(:any)'] = 'admin_pages/edit_student/$1';
$route['admin/student/edit/confirm/(:any)'] = 'admin_crud/edit_student_confirm/$1';
$route['admin/student/change-password/(:any)'] = 'admin_crud/student_change_password/$1';


$route['admin/student/delete/(:any)'] = 'admin_crud/delete_student/$1';


/*************** Admin Routes End *****************/


// $route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
