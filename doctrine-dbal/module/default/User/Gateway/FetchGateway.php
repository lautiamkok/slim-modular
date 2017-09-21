<?php
namespace Monsoon\User\Gateway;

use \Monsoon\User\Gateway\Gateway;
use \Monsoon\User\Model\UserModel;

class FetchGateway extends Gateway
{
    public function fetchUsers($columns = [])
    {
        // Get user(s).
        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/query-builder.html#building-a-query
        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/data-retrieval-and-manipulation.html#fetchall
        $collection = $this->builder
            ->select(implode(",", $columns))
            ->from('user')
            ->execute()
            ->fetchAll()
            ;

        // Return the result.
        return $collection;
    }

    public function fetchUser($columns = [], $where = [])
    {
        // Throw error if where search is not provide.
        if (count($where) === 0) {
            throw new \Exception('$where is empty from the mapper', 400);
        }

        // Get user.
        $data = $this->builder
            ->select(implode(",", $columns))
            ->from('user')
            ->where('name = ?')
            ->setParameter(0, $where['name'])
            ->execute()
            ->fetch()
            ;

        // Throw error if no result found.
        // https://laravel.com/docs/5.5/collections#method-count
        if (!$data) {
            throw new \Exception('No user found', 400);
        }

        // Return the result.
        return $data;
    }
}
