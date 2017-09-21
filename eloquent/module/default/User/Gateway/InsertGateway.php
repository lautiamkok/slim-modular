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
        // https://laravel.com/docs/5.5/queries#inserts
        $result = $this->database->table('user')
            ->insert([
                'uuid' => $uuid,
                'name' => $name,
                'email' => $email,
                'created_on' => $createdOn
            ]);

        // Throw if it fails.
        if (!$result) {
            throw new \Exception('Insert row failed', 400);
        }

        // Return the model if it is OK.
        return $user;
    }
}
