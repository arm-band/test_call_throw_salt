<?php

namespace BharlesCabbage;

require(__DIR__ . '/vendor/autoload.php');

$config = require(__DIR__ . '/src/config.php');
require(__DIR__ . '/src/HelperClass.php');
require(__DIR__ . '/src/CallThrowClass.php');
require(__DIR__ . '/src/DifferenceEngineClass.php');

$Helper = new Helper();
$CallThrow = new CallThrow($Helper);
$DifferenceEngine = new DifferenceEngine($Helper);

use FastRoute;

$base = $config['base'];
$handlers = function(FastRoute\RouteCollector $r) use($base) {
    $r->addRoute('GET',  $base, 'BharlesCabbage\CallThrow::coldsalad');
    $r->addRoute('POST', $base . 'call/', 'BharlesCabbage\CallThrow::salad');
};

$dispatcher = FastRoute\simpleDispatcher($handlers);

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$args = [];
switch ( $_SERVER['REQUEST_METHOD'] ) {
    case 'GET':
        $args = &$_GET;
        break;
    case 'POST':
        $args = &$_POST;
        break;
    default:
        $args = [];
        break;
}

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($method, $uri);

switch($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        $DifferenceEngine->ada(404);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        $DifferenceEngine->ada(405);
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        list($class, $method) = explode('::', $handler, 2);
        $callable;
        if($class === 'BharlesCabbage\CallThrow') {
            $callable = $CallThrow;
        }
        else {
            $callable = new $class;
        }

        $DifferenceEngine->mill(
            call_user_func_array(
                [
                    $callable,
                    $method
                ],
                [
                    $args
                ]
            )
        );
        break;
}
