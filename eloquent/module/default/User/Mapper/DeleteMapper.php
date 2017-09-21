<?php
namespace Monsoon\User\Mapper;

use \Monsoon\User\Mapper\Mapper;

class DeleteMapper extends Mapper
{
    public function deleteUser($data = [])
    {
        // Throw error if array is empty.
        if (count($data) === 0) {
            throw new \Exception('$data is empty from the controller', 400);
        }

        $model = $this->mapObject($data);
        return $this->gateway->deleteUser($model);
    }
}
