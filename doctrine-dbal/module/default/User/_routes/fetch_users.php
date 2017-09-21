<?php
// PSR 7 standard.
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/users', function (Request $request, Response $response, $args) {

    // If you want to access the Slim settings again.
    // $settings = $this->get("settings");

    // Log anything.
    $this->get('Monolog\Logger')->addInfo("Logged from route /users");

    // Foo.
    $foo = $this->get('Monsoon\Core\Foo');
    // var_dump($foo->getWidth());
    // var_dump($foo->getHeight());

    // Autowiring the controller.
    $controller = $this->get('Monsoon\User\Controller\FetchController');

    // Obtain result.
    $users = $controller->fetchUsers($request);

    // Convert timestamp to a local time.
    $timestamp = $this->get('Monsoon\Core\Utils\TimestampConvertor');
    $newUsers = [];
    foreach ($users as $key => $user) {
        $user['createdOn'] = $timestamp->convert($user['createdOn']);
        $user['updatedOn'] = $timestamp->convert($user['updatedOn']);
        $newUsers[] = $user;
    }

    $response->getBody()->write(json_encode($newUsers));
    // Or:
    // return $response->withJson($newUsers);

    // Below are now handled by the middleware.
    // $data = [
    //     "status" => $status,
    //     "data" => $newUsers
    // ];

    // $response->getBody()->write(json_encode($data));
    // return $response->withStatus($status);

    // Catch errors in middleware instead so no repetitive catch in all routes.
    // Default status code.
    // $status = 200;

    // // Catch errors.
    // try {
    //     // Autowiring the controller.
    //     $controller = $this->get('\Monsoon\User\Controller\FetchController');

    //     // Obtain result.
    //     $users = $controller->fetchUsers($request);
    //     $data = [
    //         "status" => $status,
    //         "data" => $users
    //     ];
    // } catch (\Exception $error) {
    //     $status = $error->getCode();
    //     $data = [
    //         "status" => $error->getCode(),
    //         "messsage" => $error->getMessage()
    //     ];
    // };

    // $response->getBody()->write(json_encode($data));
    // return $response
    //     ->withStatus($status)
    //     ->withHeader('Content-type', 'application/json');
});
