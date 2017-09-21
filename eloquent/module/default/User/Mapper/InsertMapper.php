<?php
namespace Monsoon\User\Mapper;

use \Monsoon\User\Mapper\Mapper;

class InsertMapper extends Mapper
{
    public function insertUser($params = [])
    {
        // Throw error if array is empty.
        if (count($params) === 0) {
            throw new \Exception('$params is empty from the controller', 400);
        }

        $model = $this->mapObject($params);
        return $this->gateway->insertUser($model);
    }
}
