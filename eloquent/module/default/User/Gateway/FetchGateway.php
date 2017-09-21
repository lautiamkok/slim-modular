<?php
namespace Monsoon\User\Gateway;

use \Monsoon\User\Gateway\Gateway;
use \Monsoon\User\Model\UserModel;

class FetchGateway extends Gateway
{
    public function fetchUsers($columns = [])
    {
        // Get user(s).
        $collection = $this->database->table('user')
            ->get($columns);

        // https://laravel.com/docs/5.5/collections#method-map
        $collectionArray = $collection->map(function ($item, $key) {
            return (array)$item;
        });

        // Return the result.
        return $collectionArray->all();
    }

    public function fetchUser($columns = [], $where = [])
    {
        // Throw error if where search is not provide.
        if (count($where) === 0) {
            throw new \Exception('$where is empty from the mapper', 400);
        }

        // Get user.
        // https://laravel.com/docs/5.5/collections#method-first
        $data = $this->database->table('user')
            ->where('name', '=', $where['name'])
            ->first($columns);

        // Throw error if no result found.
        // https://laravel.com/docs/5.5/collections#method-count
        if (!$data) {
            throw new \Exception('No user found', 400);
        }

        // Return the result.
        return (array)$data;
    }
}
