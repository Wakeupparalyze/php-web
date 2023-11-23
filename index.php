<?php
declare(strict_types=1);
session_start();
require 'vendor/autoload.php'; // альтернатива tracy.phar
use \NoahBuscher\Macaw\Macaw;
use Tracy\Debugger;
Debugger::enable();



Macaw::get('/', 'App\FrontController@index');
Macaw::get('/article/(:num)', 'App\FrontController@article');
Macaw::get('/admin', 'App\FrontController@admin');
Macaw::get('/adminpanel', 'App\FrontController@adminpanel');
Macaw::get('/about', 'App\FrontController@goAbout');
Macaw::get('/articles', 'App\FrontController@index');
Macaw::get('/portfolio', 'App\FrontController@portfolio');
Macaw::get('/team', 'App\FrontController@team');



Macaw::dispatch();






//error_reporting(E_ALL);
//ini_set('display_errors', 'on');
//include_once 'function.php';
//
//
//
//include 'template/frontend/partials/head.php';
//include 'template/frontend/partials/search.php';
//include 'template/frontend/partials/blog-list.php';
//include 'template/frontend/partials/sidebar.php';
//include 'template/frontend/partials/footer.php';
