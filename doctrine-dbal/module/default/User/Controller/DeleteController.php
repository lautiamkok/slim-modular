<?php
namespace Monsoon\User\Controller;

// PSR 7 standard.
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use \Monsoon\User\Controller\Controller;
use \Monsoon\User\Gateway\DeleteGateway;
use \Monsoon\User\Mapper\DeleteMapper;

class DeleteController extends Controller
{
    public function deleteUser(Request $request)
    {
        // Get params and validate them here.
        $uuid = $request->getParam('uuid');

        // Throw if empty.
        if (!$uuid) {
            throw new \Exception('$uuid is empty', 400);
        }

        $gateway = new DeleteGateway($this->connection);
        $mapper = new DeleteMapper($gateway);
        $model = $mapper->deleteUser([
            "uuid" => $uuid
        ]);

        return $model->toArray();
    }

    public function deleteUsers(array $args)
    {
        //
    }
}
