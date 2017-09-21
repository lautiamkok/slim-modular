<?php
namespace Monsoon\User\Mapper;

use \Monsoon\Core\Strategy\GatewayInterface;
use \Monsoon\Core\Mapper\Mapper as CoreMapper;

abstract class Mapper extends CoreMapper
{
    protected $gateway;
    protected $model = 'Monsoon\User\Model\Model';
    protected $collection = 'Monsoon\User\Model\Collection';

    public function __construct(GatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }
}
