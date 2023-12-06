<?php
declare(strict_types=1);

require('vendor/autoload.php');


use FastRoute\RouteCollector;
use Opis\Database\Connection;
use Opis\Database\Database;
use Psr\Container\ContainerInterface;
use function DI\factory;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->useAutowiring(false);
$containerBuilder->useAttributes(false);
$containerBuilder->addDefinitions('config/config.php');
$container = $containerBuilder->build();

$dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r) {
    $r->addRoute('GET', '/', ['App\FrontController', 'index']);
    $r->addRoute('GET', 'article/(:num)', ['App\FrontEndController', '/article']);
    $r->addRoute('GET', 'admin', ['App\BackEndController', '/admin']);
    $r->addRoute('GET', 'admin/articles', ['App\BackEndController', '/adminArticlesPage']);
    $r->addRoute('POST','admin/update', ['App\BackEndController', '/adminUpdateArticle']);
    $r->addRoute('GET', 'admin/article/edit/(:num)', ['App\BackEndController', '/adminEditArticle']);
    $r->addRoute('GET', 'admin/article/create', ['App\BackEndController', '/adminCreateArticle']);
    $r->addRoute('GET', 'admin/article/delete/(:num)', ['App\BackEndController', '/adminDeleteArticle']);
    $r->addRoute('GET', 'about', ['App\FrontEndController', 'goAbout']);
    $r->addRoute('GET', 'articles', ['App\FrontEndController', 'index']);
    $r->addRoute('GET', 'portfolio', ['App\BackEndController', 'portfolio']);
    $r->addRoute('GET', 'team', ['App\BackEndController', 'team']);
});

$route = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
switch ($route[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        echo '404 Not Found';
        break;

    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        echo '405 Method Not Allowed';
        break;

    case FastRoute\Dispatcher::FOUND:
        $controller = $route[1];
        $parameters = $route[2];

        // We could do $container->get($controller) but $container->call()
        // does that automatically
        $container->call($controller, $parameters);
        break;
}






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
