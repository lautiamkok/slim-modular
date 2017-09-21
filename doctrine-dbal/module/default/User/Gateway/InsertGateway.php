<?php
namespace Monsoon\User\Gateway;

use \Monsoon\User\Gateway\Gateway;
use \Monsoon\User\Model\Model;

class InsertGateway extends Gateway
{
    public function insertUser(Model $user)
    {
        // Get data from the model.
        $uuid = $user->getUuid();
        $name = $user->getName();
        $email = $user->getEmail();
        $createdOn = $user->getCreatedOn();

        // Throw if empty.
        if (!$uuid) {
            throw new \Exception('$uuid is empty', 400);
        }

        // Throw if empty.
        if (!$name) {
            throw new \Exception('$name is empty', 400);
        }

        // Throw if empty.
        if (!$email) {
            throw new \Exception('$email is empty', 400);
        }

        // Throw if empty.
        if (!$email) {
            throw new \Exception('$email is empty', 400);
        }

        // Throw if empty.
        if (!$createdOn) {
            throw new \Exception('$createdOn is empty', 400);
        }

        // Insert user.
        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#insert
        $result = $this->connection
            ->insert('user', [
                'uuid' => $uuid,
                'name' => $name,
                'email' => $email,
                'created_on' => $createdOn
            ]);

        // With query builder.
        // $result = $this->builder
        //     ->insert('user')
        //     ->values([
        //         'uuid' => '?',
        //         'name' => '?',
        //         'email' => '?',
        //         'created_on' => '?'
        //     ])
        //     ->setParameter(0, $uuid)
        //     ->setParameter(1, $name)
        //     ->setParameter(2, $email)
        //     ->setParameter(3, $createdOn)
        //     ->execute()
        //     ;

        // Throw if it fails.
        if (!$result === 1) {
            throw new \Exception('Insert row failed', 400);
        }

        // Return the model if it is OK.
        return $user;
    }
}
