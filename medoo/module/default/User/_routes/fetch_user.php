<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/users/{name}', function (Request $request, Response $response, $args) {

    // Autowiring the controller.
    $controller = $this->get('Monsoon\User\Controller\FetchController');

    // Default status code.
    $status = 200;

    // Obtain result.
    $user = $controller->fetchUser($request, $args);

    // Convert timestamp to a local time.
    $timestamp = $this->get('Monsoon\Core\Utils\TimestampConvertor');
    $user['createdOn'] = $timestamp->convert($user['createdOn']);
    $user['updatedOn'] = $timestamp->convert($user['updatedOn']);

    $data = [
        "status" => $status,
        "data" => $user
    ];

    $response->getBody()->write(json_encode($data));
    return $response->withStatus($status);
});
