<?php
namespace Monsoon\User\Gateway;

use \Monsoon\Core\Gateway\Gateway as CoreGateway;
use \Illuminate\Database\Capsule\Manager;

abstract class Gateway extends CoreGateway
{
    protected $database;

    public function __construct(Manager $database)
    {
        $this->database = $database;
    }
}
