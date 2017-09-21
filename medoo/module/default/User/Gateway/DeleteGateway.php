<?php
namespace Monsoon\User\Gateway;

use \Monsoon\User\Gateway\Gateway;
use \Monsoon\User\Model\Model;

class DeleteGateway extends Gateway
{
    public function deleteUser(Model $user)
    {
        // Get data from the model.
        $uuid = $user->getUuid();

        // Throw if empty.
        if (!$uuid) {
            throw new \Exception('$uuid is empty', 400);
        }

        // Delete user(s).
        // https://medoo.in/api/delete
        $result = $this->database->delete("user", [
            "uuid" => $uuid
        ]);

        // Check the number of rows affected by the last SQL statement.
        // Throw if it fails.
        if ($result->rowCount() === 0) {
            throw new \Exception('Delete row failed', 400);
        }

        // Return the model if it is OK.
        return $user;
    }
}
