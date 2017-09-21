<?php
namespace Monsoon\User\Mapper;

use \Monsoon\User\Mapper\Mapper;

class UpdateMapper extends Mapper
{
    public function updateUser($data = [], $where = [])
    {
        // Throw error if array is empty.
        if (count($data) === 0) {
            throw new \Exception('$data is empty from the controller', 400);
        }

        // Throw error if array is empty.
        if (count($where) === 0) {
            throw new \Exception('$where is empty from the controller', 400);
        }

        $model = $this->mapObject($data);
        return $this->gateway->updateUser($model, $where);
    }
}
