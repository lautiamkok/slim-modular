<?php
// PSR 7 standard.
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->put('/users', function (Request $request, Response $response, $args) {

    // Autowiring the controller.
    $controller = $this->get('Monsoon\User\Controller\UpdateController');

    // Default status code.
    $status = 200;

    // Obtain result.
    $data = $controller->updateUser($request);
    $data = [
        "status" => $status,
        "data" => $data
    ];

    $response->getBody()->write(json_encode($data));
    return $response->withStatus($status);
});
