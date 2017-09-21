<?php
namespace Monsoon\User\Gateway;

use \Monsoon\Core\Gateway\Gateway as CoreGateway;
use \Doctrine\DBAL\Connection;

abstract class Gateway extends CoreGateway
{
    protected $connection;
    protected $builder;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;

        // http://docs.doctrine-project.org/projects/doctrine-dbal/en/latest/reference/query-builder.html#sql-query-builder
        $this->builder = $connection->createQueryBuilder();
    }
}
