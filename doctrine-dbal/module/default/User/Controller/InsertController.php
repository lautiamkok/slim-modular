<?php
namespace Monsoon\User\Controller;

// PSR 7 standard.
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Uuid generator.
use \Ramsey\Uuid\Uuid;

use \Monsoon\User\Controller\Controller;
use \Monsoon\User\Gateway\InsertGateway;
use \Monsoon\User\Mapper\InsertMapper;

class InsertController extends Controller
{
    public function insertUser(Request $request)
    {
        // Get params and validate them here.
        // POST or PUT
        // $allPostPutVars = $request->getParsedBody();
        // foreach($allPostPutVars as $key => $param){
        //     //POST or PUT parameters list
        //     var_dump($param);
        // }
        // // Single POST/PUT parameter
        // $name = $allPostPutVars['name'];
        // $email = $allPostPutVars['email'];

        // Or, better:
        $name = $request->getParam('name'); // by key
        $email = $request->getParam('email'); // by key

        // Throw if empty.
        if (!$name) {
            throw new \Exception('$name is empty', 400);
        }

        // Throw if empty.
        if (!$email) {
            throw new \Exception('$email is empty', 400);
        }

        // Create a timestamp.
        $date = new \DateTime();
        $timestamp = $date->getTimestamp();
        // Or:
        // $timestamp = time();

        // Generate a version 3 (name-based and hashed with MD5) UUID object.
        // https://github.com/ramsey/uuid
        $uuid3 = Uuid::uuid3(Uuid::NAMESPACE_DNS, 'USER');
        $uuid = $uuid3->toString();

        $gateway = new InsertGateway($this->connection);
        $mapper = new InsertMapper($gateway);
        $model = $mapper->insertUser([
            'uuid' => $uuid,
            'name' => $name,
            'email' => $email,
            'created_on' => $timestamp,

            // Below shows that you won't be able to set this in the model as it
            // is not declared in the model itself.
            'id' => 123
        ]);

        return $model->toArray();
    }

    public function insertUsers(array $args)
    {
        //
    }
}
