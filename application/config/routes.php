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
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Division
$route['division/(:num)'] = 'main/division_document/$1';
$route['division/(:num)/(:any)'] = 'main/division_document/$1/$2';

$route['division'] = 'admin/division';
$route['division/create'] = 'admin/create_division';
$route['division/update/(:num)'] = 'admin/update_division/$1';

// Department
$route['department/(:num)'] = 'main/department_document/$1';
$route['department/(:num)/(:any)'] = 'main/department_document/$1/$2';

$route['department'] = 'admin/department';
$route['department/create'] = 'admin/create_department';
$route['department/update/(:num)'] = 'admin/update_department/$1';
$route['department/remove/(:num)'] = 'admin/delete_department/$1';

// Document Level
$route['document'] = 'admin/document';
$route['document/upload'] = 'admin/document_upload';
$route['documents/(:any)'] = 'main/document_level/$1';
$route['document/update/(:num)'] = 'admin/document_update/$1';
$route['document/create'] = 'admin/document_type_create';

// Document Viewer
$route['iso/document/(:any)'] = 'main/iso_document/$1';

// Masterlist
$route['admin/document/update/(:num)'] = 'admin/masterlist_update/$1';
$route['admin/remove/file/(:num)'] = 'admin/remove_file/$1';
$route['admin/remove/document/(:num)'] = 'admin/delete_document/$1';

$route['admin/document/update/(:any)'] = function() {
	show_404();
};