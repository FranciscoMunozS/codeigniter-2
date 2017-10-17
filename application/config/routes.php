<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['products/view/(:num)'] = 'products/view/$1';
$route['products/add'] = 'products/add';
$route['products/edit/(:num)'] = 'products/edit/$1';
$route['products/delete/(:num)'] = 'products/delete/$1';
$route['products'] = 'products';

$route['posts/view/(:num)'] = 'posts/view/$1';
$route['posts/add'] = 'posts/add';
$route['posts/edit/(:num)'] = 'posts/edit/$1';
$route['posts/delete/(:num)'] = 'posts/delete/$1';
$route['posts'] = 'posts';
