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

//****** AUTH ***********
$route['login'] = 'auth/login';
$route['forgot-password'] = 'auth/forgot_password';
$route['reset-password'] = 'auth/reset_password';
$route['logout'] = 'auth/logout';
$route['register'] = 'auth/register';
$route['activation'] = 'auth/activation';
$route['activation/(:any)'] = 'auth/activation/$1';
$route['resend-activation/(:any)'] = 'auth/resend_activation/$1';

// ****** AJAX **************

$route['ajax/register'] = 'ajax/register';
$route['ajax/login'] = 'ajax/login';
$route['ajax/proccess_deposit'] = 'ajax/proccess_deposit';
$route['ajax/add_friend'] = 'ajax/add_friend';
$route['ajax/switch_language'] = 'ajax/switch_language';
$route['ajax/switch_device'] = 'ajax/switch_device';


//****** APP ************
$route['dashboard'] = 'main/dashboard';
$route['transactions'] = 'transactions/all';
$route['transactions/all'] = 'transactions/all';
$route['deposit'] = 'deposit';
$route['deposit/forms/(:any)'] = 'deposit/forms/$1';
$route['friend'] = 'friend';
$route['friends/all'] = 'friends';
$route['friends/add'] = 'friends/add';
$route['friends/edit/(:any)'] = 'friends/edit/$1';
$route['settings'] = 'settings';

$route['send'] = 'send/index';
$route['send-to-email'] = 'send/send_to_email';
$route['send-to-cell'] = 'send/send_to_cell';


$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
