<?php
namespace Monsoon\Core\Model;

use \Monsoon\Core\Strategy\ModelInterface;
use \Monsoon\Core\Model\Utils;

abstract class Model implements ModelInterface
{
    /**
     * Import the utils.
     */
    use Utils;

    /**
     * Force Extending class to define this method.
     * @param array $params [description]
     */
    abstract public function setOptions(array $params);
}
