<?php
namespace Monsoon\User\Controller;

// PSR 7 standard.
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use \Monsoon\User\Controller\Controller;
use \Monsoon\User\Gateway\FetchGateway;
use \Monsoon\User\Mapper\FetchMapper;

class FetchController extends Controller
{
    public function fetchUsers(Request $request)
    {
        $gateway = new FetchGateway($this->database);
        $mapper = new FetchMapper($gateway);
        $collection = $mapper->fetchUsers([
            'uuid',
            'name',
            'created_on',
            'updated_on',
        ]);

        return $collection->toArray();
    }

    public function fetchUser(Request $request, array $args)
    {
        $gateway = new FetchGateway($this->database);
        $mapper = new FetchMapper($gateway);
        $model = $mapper->fetchUser([
            'uuid',
            'name',
            'email',
            'created_on',
            'updated_on',
        ], [
            "name" => $args['name']
        ]);

        return $model->toArray();
    }
}
