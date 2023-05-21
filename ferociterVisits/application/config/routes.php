<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
| my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'admin_controller/index';
$route['login'] = 'admin_controller/index';
$route['logout'] = 'login_controller/logout';
$route['reset'] = 'admin_controller/reset';
$route['dashboard'] = 'admin_controller/dashboard';
$route['visitors'] = 'admin_controller/visitors';
$route['(:num)'] = 'admin_controller/visitorVisits';
$route['users'] = 'admin_controller/users';

$route['addUser'] = 'admin_controller/addUser';
$route['editUser'] = 'admin_controller/editUser';

$route['reports'] = 'admin_controller/reports';
$route['settings'] = 'admin_controller/settings';
$route['booklog'] = 'admin_controller/booklog';
$route['updateSystemUser'] = 'admin_controller/updateSystemUser';
// $route['deposits'] = 'admin_controller/index';
// $route['withdrawals'] = 'admin_controller/index';
// $route['referrals'] = 'admin_controller/index';
// $route['profile-update'] = 'admin_controller/index';

$route['(:any)'] = 'admin_controller/visitorVisits';


$route['visitor/(:num)'] = 'admin_controller/visitorVisits';

$route['editUser/(:num)'] = 'admin_controller/User';












$route['acountDetail'] = 'acountDetailController/index';

$route['transaction'] = 'transactionController/index';
//data utilities
$route['FI'] = 'FIS/index';
$route['onboarding'] = 'FIOnboarding/index';














$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
