<?php
// PSR 7 standard.
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->put('/users', function (Request $request, Response $response, $args) {

    // Autowiring the controller.
    $controller = $this->get('Monsoon\User\Controller\UpdateController');

    // Obtain result.
    $result = $controller->updateUser($request);
    $response->getBody()->write(json_encode($result));
});
