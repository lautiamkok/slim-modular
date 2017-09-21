<?php
namespace Monsoon\User\Controller;

use \Monsoon\Core\Controller\Controller as CoreController;
use \Medoo\Medoo;
use \Monolog\Logger;

abstract class Controller extends CoreController
{
    protected $database;

    public function __construct(
        Medoo $database,
        Logger $logger
    ) {
        $this->database = $database;

        // Log anything.
        $logger->addInfo("Logged from Monsoon\User\Controller\Controller");
    }
}
