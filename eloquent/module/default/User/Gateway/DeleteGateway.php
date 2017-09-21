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
        // https://laravel.com/docs/5.5/queries#deletes
        $result = $this->database->table('user')
            ->where("uuid", $uuid)
            ->delete();

        // Throw if it fails.
        if ($result === 0) {
            throw new \Exception('Delete row failed', 400);
        }

        // Return the model if it is OK.
        return $user;
    }
}
