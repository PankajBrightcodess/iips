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
$route['default_controller'] = 'website';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

////////////////////////////////////////////////////
$route['adminpanel'] ='admin/login'; 
$route['admin/masterkey/(:any)'] ='adminpanel/masterkey/$1'; 
$route['admin/masterkey/(:any)/(:num)'] ='adminpanel/masterkey/$1/$2'; 
$route['admin/product/(:any)'] ='adminpanel/product/$1'; 
$route['admin/product/(:any)/(:num)'] ='adminpanel/product/$1/$2'; 
$route['admin/addons/(:any)'] = 'adminpanel/addons/$1'; 
$route['admin/addons/(:any)/(:num)'] ='adminpanel/addons/$1/$2'; 
$route['admin/deliverytime/(:any)'] ='adminpanel/deliverytime/$1'; 
$route['admin/deliverytime/(:any)/(:num)'] ='adminpanel/deliverytime/$1/$2'; 
$route['admin/inventory/(:any)'] ='adminpanel/inventory/$1';
$route['admin/inventory/(:any)/(:num)'] ='adminpanel/inventory/$1/$2';

$route['admin/sales/(:any)'] ='adminpanel/sales/$1';
$route['admin/sales/(:any)/(:num)'] ='adminpanel/sales/$1/$2';

$route['admin/stock/(:any)'] ='adminpanel/stock/$1';
$route['admin/payment/(:any)'] ='adminpanel/payment/$1';
$route['admin/staff/(:any)'] ='adminpanel/staff/$1';

$route['admin/report/(:any)'] = 'adminpanel/report/$1';
$route['admin/report/(:any)/(:num)'] = 'adminpanel/report/$1/$2';

$route['admin/staff/(:any)/(:num)'] = 'adminpanel/staff/$1/$2';
$route['admin/valet/(:any)'] = 'adminpanel/valet/$1';
$route['admin/valet/(:any)/(:num)'] = 'adminpanel/valet/$1/$2';

$route['admin/website/(:any)'] = 'adminpanel/website/$1';
$route['admin/website/(:any)/(:num)'] = 'adminpanel/website/$1/$2';
////////////////////////////////////////////////////
$route['filter'] = 'website/filter';
//$route['description'] = 'website/description';
$route['product/(:any)'] = 'website/product_description/$1';
$route['register'] = 'website/register';
$route['login'] = 'website/login';
$route['userlogout'] = 'website/logout';
$route['cart'] = 'website/cart_content';
$route['checkout'] = 'website/checkout';
$route['makepayment'] = 'website/makepayment';
$route['profile'] = 'website/profile';
$route['myorders'] = 'website/myorders';
///////////////////////////////////////////////////

$route['app_product/(:any)'] = 'app/product_description/$1';

//////////////////////////////////////////////////

$route['forgotpassword'] = 'admin/forgotpassword';
$route['enterotp'] = 'admin/enterotp';
$route['resetpassword'] = 'admin/resetpassword';
$route['logout'] = 'admin/logout';
///////////////////////////////////////////////////
$route['search'] = 'website/search_view';
$route['lowcat/(:any)'] = 'website/lowcategory_view';
$route['subcat/(:any)'] = 'website/subcategory_view';
$route['cat/(:any)'] = 'website/category_view';
