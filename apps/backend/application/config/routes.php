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

$route['dashboard'] = 'main/dashboard';
$route['deposit'] = 'main/deposit';
$route['transfer'] = 'main/transfer';
$route['settings'] = 'main/settings';
$route['history'] = 'main/history';
$route['wallets'] = 'main/wallets';
$route['wallets'] = 'main/wallets';
$route['xannia-cards'] = 'main/xannia_cards';

$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['register'] = 'auth/register';
$route['register/success'] = 'auth/registration_success';
$route['email-activation/(:any)/(:any)'] = 'auth/email_activation/$1/$2';
$route['password-reset/(:any)/(:any)'] = 'auth/password_reset/$1/$2';
$route['finish-setup/(:any)/(:any)'] = 'auth/finish_setup/$1/$2';

$route['api/login'] = 'api/login';
$route['api/register'] = 'api/register';
$route['api/activate_account'] = 'api/activate_account';
$route['api/forgot_password'] = 'api/forgot_password';
$route['api/complete_forgot_password'] = 'api/complete_forgot_password';
$route['api/setup_complete'] = 'api/setup_complete';
$route['api/clear_lockdown'] = 'api/clear_lockdown';
$route['api/update_user'] = 'api/update_user';
$route['api/logout'] = 'api/logout';
$route['api/deposit/card'] = 'api/carddeposit';
$route['api/get_recipient'] = 'api/getrecipient';
$route['api/transfer_money'] = 'api/transfermoney';
$route['api/get_graph_data'] = 'api/getgraphdata';
$route['api/refresh_wallet'] = 'api/refreshwallet';
$route['api/get_transactions'] = 'api/get_transactions';
$route['api/get_rates'] = 'api/get_rates';
$route['api/add_recipient'] = 'api/add_recipient';

$route['api/add_wallet'] = 'api/add_wallet';
$route['api/delete_wallet'] = 'api/delete_wallet';
$route['api/make_default_wallet'] = 'api/make_default_wallet';
$route['api/create_card'] = 'api/create_card';
$route['api/delete_card'] = 'api/delete_card';
$route['api/become_merchant'] = 'api/become_merchant';

$route['default_controller'] = 'auth/login';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
