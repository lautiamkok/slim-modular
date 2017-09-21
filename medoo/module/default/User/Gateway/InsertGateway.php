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
        // https://medoo.in/api/insert
        $result = $this->database->insert('user', [
            'uuid' => $uuid,
            'name' => $name,
            'email' => $email,
            'created_on' => $createdOn
        ]);

        // Throw if it fails.
        // Returns the number of rows affected by the last SQL statement.
        if ($result->rowCount() === 0) {
            throw new \Exception('Insert row failed', 400);
        }

        // Return the model if it is OK.
        return $user;
    }
}
