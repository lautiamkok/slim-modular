<?php
if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

// PSR 7 standard.
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Bootstrap the app environment.
chdir(dirname(__DIR__));
require 'bootstrap.php';

// Configure the Slim app.
// https://www.slimframework.com/docs/objects/application.html
$settings = require 'config/application.php';

// Using a different container
// http://discourse.slimframework.com/t/using-a-different-container/1029
// https://akrabat.com/replacing-pimple-in-a-slim-3-application/
$container = new \League\Container\Container;
$container->delegate(new \Slim\Container($settings));

// Required to enable auto wiring.
// https://jenssegers.com/73/dependency-injection-with-league-s-new-container
$container->delegate(
    new \League\Container\ReflectionContainer
);

// Get an instance of Slim.
$app = new \Slim\App($container);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");

    // Below are now handled by the middleware.
    // $data = [
    //     "status" => 200,
    //     "message" => "Hello world!"
    // ];
    // $response->getBody()->write(json_encode($data));
    // return $response->withHeader('Content-type', 'application/json');
});

// Register dependencies.
require 'dependencies.php';

// Register middlewares.
require 'middlewares.php';

// Register routes.
require 'routes.php';

// Run the application!
$app->run();
