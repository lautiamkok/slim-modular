<?php
namespace Monsoon\Core\Model;

trait Utils
{
    function toArray()
    {
        // When you are using the $this context get_object_vars() is giving you
        // all the accessible properties. Which would include private and
        // protected.
        $data = get_object_vars($this);

        $normalise = function (&$item) {
            if (is_object($item)) {
                $item = $item->toArray();
            }
        };

        array_walk_recursive($data, $normalise);

        return $data;
    }
}
