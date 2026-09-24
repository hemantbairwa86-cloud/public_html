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
$route['default_controller'] = 'home';

$route['translate_uri_dashes'] = FALSE;
$route['shopby/(:any)'] = 'shopby/index/$1';
$route['shopby/(:any)/(:any)'] = 'shopby/index/$1';

$route['404_override'] = 'error_404';
$route['customer/(:num)'] = 'review';
$route['offers/(:num)'] = 'offers';



$route["terms-and-conditions"] = "terms/index";
$route["privacy-policy"] = "terms/privacy_policy";
$route["refund-policy"] = "terms/refund_policy";
$route["shipping-policy"] = "terms/shipping_policy";
$route["shopping-cart"] = "cart/index";

// Venus
$route['products/(:any)'] = 'products/index/$1';
$route['products/(:any)/(:any)'] = 'products/index/$1';
$route['product/(:any)/(:any)'] = 'products/product/$1/$2';

$route["our-products"] = "ourproducts/index";


$route["about/company"] = "about/index";
$route["product-manufacturing"] = "about/product_manufacturing";
$route["third-party-manufacturing"] = "about/third_party_manufacturing";

$route["forgot-password"] = "login/forgot";
$route["reset-password"] = "login/reset_link";
$route["register"] = "login/index/register";
$route["signup"] = "login/index/register";

$route["profile/change-password"] = "dashboard/update_password";