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
$route['app'] = 'home/index';
$route['app/name_task'] = 'home/index/name_task';
$route['app/priority'] = 'home/index/priority';
$route['app/due_date'] = 'home/index/due_date';
$route['settings'] = 'home/settings_page';
$route['settings/1'] = 'home/settings_page/account';
$route['settings/2'] = 'home/settings_page/achievement';
$route['settings/3'] = 'home/settings_page/reminder';
$route['settings/4'] = 'home/settings_page/support';
$route['settings/5'] = 'home/settings_page/about';
$route['achievement'] = 'home/achieve_page';
$route['calendar'] = 'home/calendar';
$route['signup'] = 'login/signup';
$route['logout'] = 'home/logout';
$route['change_password'] = 'home/change_pass';
$route['feedback'] = 'home/add_feedback';
$route['delete_feed'] = 'home/delete_feed';


$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
