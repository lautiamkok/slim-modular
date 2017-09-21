<?php
namespace Monsoon\Core\Strategy;

interface ModelInterface
{
    public function setOptions(array $params);
    public function toArray();
}
