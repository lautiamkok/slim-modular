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
        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#delete
        $result = $this->connection
            ->delete('user',[
                'uuid' => $uuid
            ]);

        // Throw if it fails.
        if ($result === 0) {
            throw new \Exception('Delete row failed', 400);
        }

        // Return the model if it is OK.
        return $user;
    }
}
