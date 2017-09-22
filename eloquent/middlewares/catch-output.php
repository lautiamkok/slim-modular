<?php
// Catch all http errors here.
$app->add(function ($request, $response, $next) use ($container) {

    // Default status code.
    $status = 200;

    // Catch errors and modify PSR7 body.
    try {
        // Call next middleware.
        $response = $next($request, $response);
        $status = $response->getStatusCode();

        // If it is 404, throw error here.
        if ($status === 404) {
            throw new \Exception('Page not found', 404);

            // A 404 should be invoked.
            // Note since it is to be taken care by the exception below
            // so comment this custom 404.
            // $handler = $container->get('notFoundHandler');
            // return $handler($request, $response);
        }

        // Modify the PSR7 body from all routes.
        // https://akrabat.com/filtering-the-psr-7-body-in-middleware/
        $content = $response->getBody();
        $data = [
            "status" => $status,
            "data" => json_decode($content, true)
        ];
        $response->getBody()->rewind();
        $response->getBody()->write(json_encode($data));
    } catch (\Exception $error) {
        $status = $error->getCode();
        $data = [
            "status" => $error->getCode(),
            "messsage" => $error->getMessage()
        ];
        $response->getBody()->write(json_encode($data));
    };
    return $response
        ->withStatus($status)
        ->withHeader('Content-type', 'application/json');
});

// Sample.
// $app->add(function ($request, $response, $next) {
//     $response->getBody()->write('BEFORE');
//     $response = $next($request, $response);
//     $response->getBody()->write('AFTER');

//     return $response;
// });
