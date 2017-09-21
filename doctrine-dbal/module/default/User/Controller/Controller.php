<?php
namespace Monsoon\User\Controller;

use \Monsoon\Core\Controller\Controller as CoreController;
use \Doctrine\DBAL\Connection;
use \Monolog\Logger;

abstract class Controller extends CoreController
{
    protected $connection;

    public function __construct(
        Connection $connection,
        Logger $logger
    ) {
        $this->connection = $connection;

        // Log anything.
        $logger->addInfo("Logged from Monsoon\User\Controller\Controller");
    }
}
