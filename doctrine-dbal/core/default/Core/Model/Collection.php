<?php
namespace Monsoon\Core\Model;

use \Monsoon\Core\Strategy\CollectionInterface;
use \Monsoon\Core\Strategy\ModelInterface;
use \Monsoon\Core\Model\Utils;

abstract class Collection implements CollectionInterface
{
    /**
     * Import the utils.
     */
    use Utils {
        toArray as protected traitToArray;
    }

    /**
     * Array that store models.
     * @var array
     */
    protected $items = [];

    /**
     * Add a model.
     * @param ModelInterface $model
     * @param [type]         $key
     */
    public function add(ModelInterface $model, $key = null)
    {
        // If no key set.
        if ($key === null) {
            $this->items[] = $model;
            return $this;
        }

        // Throw if key already exists.
        if (isset($this->items[$key])) {
            throw new \Exception('Key ' . $key . ' already in use', 500);
        }

        $this->items[$key] = $model;
        return $this;
    }

    /**
     * Delete a model by key.
     * @param  [type] $key
     * @return [type]
     */
    public function delete($key)
    {
        // Throw if no key.
        if (!$key) {
            throw new \Exception('$key is not provided', 500);
        }

        // Throw if no match.
        if (!isset($this->items[$key])) {
            throw new \Exception('Invalid key ' . $key, 500);
        }
        unset($this->items[$key]);
    }

    /**
     * Get a model by key.
     * @param  [type] $key [description]
     * @return [type]      [description]
     */
    public function get($key)
    {
        // Throw if no key.
        if (!$key) {
            throw new \Exception('$key is not provided', 500);
        }

        // Throw if no match.
        if (!isset($this->items[$key])) {
            throw new \Exception('Invalid key ' . $key, 500);
        }
        return $this->items[$key];
    }

    /**
     * Common method - convert object to array recursively.
     * @return [array] [description]
     */
    public function toArray()
    {
        $data = $this->traitToArray();
        return $data['items'];
    }
}

// Refeferences:
// https://www.sitepoint.com/collection-classes-in-php/
