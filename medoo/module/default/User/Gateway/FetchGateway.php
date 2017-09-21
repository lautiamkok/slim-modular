<?php
namespace Monsoon\User\Gateway;

use \Monsoon\User\Gateway\Gateway;
use \Monsoon\User\Model\UserModel;

class FetchGateway extends Gateway
{
    public function fetchUsers($columns = [])
    {
        // Get user(s).
        // https://medoo.in/api/select
        $data = $this->database->select('user', $columns);

        // Return the result.
        return $data;
    }

    public function fetchUser($columns = [], $where = [])
    {
        // Throw error if where search is not provide.
        if (count($where) === 0) {
            throw new \Exception('$where is empty from the mapper', 400);
        }

        // Get user.
        // https://medoo.in/api/get
        $data = $this->database->get('user', $columns, $where);

        // Throw error if no result found.
        if ($data === false) {
            throw new \Exception('No user found', 400);
        }

        // Return the result.
        return $data;
    }
}
