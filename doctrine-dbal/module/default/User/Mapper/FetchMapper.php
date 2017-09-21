<?php
namespace Monsoon\User\Mapper;

use \Monsoon\User\Mapper\Mapper;

class FetchMapper extends Mapper
{
    public function fetchUsers($columns = [])
    {
        // Throw error if where search is not provide.
        if (count($columns) === 0) {
            throw new \Exception('$columns is empty from the controller', 400);
        }

        $collection = $this->gateway->fetchUsers($columns);
        return $this->mapCollection($collection);
    }

    public function fetchUser($columns = [], $where = [])
    {
        // Throw error if where search is not provide.
        if (count($where) === 0) {
            throw new \Exception('$where is empty from the controller', 400);
        }

        $user = $this->gateway->fetchUser($columns, $where);
        return $this->mapObject($user);
    }
}
