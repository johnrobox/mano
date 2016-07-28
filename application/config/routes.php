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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'welcome';

$route['login'] = 'LoginController';
$route['login-exec'] = 'LoginController/login_exec';

$route['logout'] = 'LogoutController';

// for system administrator routing
$route['admin/dashboard'] = 'backends/admin/DashboardController';

$route['admin/admin-settings'] = 'backends/admin/AdminUserController/settings';
$route['admin/admin-settings-exec'] = 'backends/admin/AdminUserController/settings_exec';
$route['admin/user-change-profile'] = 'backends/admin/AdminUserController/change_profile';

$route['admin/register-admin'] = 'backends/admin/AdminController/register';
$route['admin/register-admin-exec'] = 'backends/admin/AdminController/register_exec';
$route['admin/admin-list'] = 'backends/admin/AdminController/admin_list';

$route['admin/register-accounting-user'] = 'backends/admin/AccountingController/register';
$route['admin/register-accounting-user-exec'] = 'backends/admin/AccountingController/register_exec';
$route['admin/accounting-user-list'] = 'backends/admin/AccountingController/accounting_list';
$route['admin/accounting-user-change-status'] = 'backends/admin/AccountingController/change_status';
$route['admin/accounting-user-delete'] = 'backends/admin/AccountingController/delete';

$route['admin/register-employee'] = 'backends/admin/EmployeeController/register';
$route['admin/register-employee-exec'] = 'backends/admin/EmployeeController/register_exec';
$route['admin/employee-list'] = 'backends/admin/EmployeeController/employee_list';
$route['admin/employee-change-status'] = 'backends/admin/EmployeeController/change_status';
$route['admin/employee-delete'] = 'backends/admin/EmployeeController/delete';
$route['admin/single-employee'] = 'backends/admin/EmployeeController/single';
$route['admin/update-employee'] = 'backends/admin/EmployeeController/update';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
