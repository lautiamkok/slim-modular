<?php
namespace Monsoon\User\Model;

use \Monsoon\Core\Model\Model as AbstractModel;

class Model extends AbstractModel
{
    protected $uuid;
    protected $email;
    protected $name;
    protected $createdOn;
    protected $updatedOn;

    /**
     * [__construct description]
     * @param array $params [description]
     */
    public function __construct(array $params = [])
    {
        $this->setOptions($params);
    }

    /**
     * [setOptions description]
     * @param array $params [description]
     */
    public function setOptions(array $params)
    {
        foreach ($params as $key => $value) {
            switch ($key) {
                case 'uuid':
                    $this->setUuid($value);
                    break;
                case 'email':
                    $this->setEmail($value);
                    break;
                case 'name':
                    $this->setName($value);
                    break;
                case 'created_on':
                    $this->setCreatedOn($value);
                    break;
                case 'updated_on':
                    $this->setUpdatedOn($value);
                    break;
            }
        }
    }

    // Setters:

    /**
     * [setUuid description]
     * @param [type] $uuid [description]
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * [setName description]
     * @param [type] $name [description]
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * [setName description]
     * @param [type] $name [description]
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * [setCreatedOn description]
     * @param [type] $createdOn [description]
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     * [setUpdatedOn description]
     * @param [type] $updatedOn [description]
     */
    public function setUpdatedOn($updatedOn)
    {
        $this->updatedOn = $updatedOn;
        return $this;
    }

    // Getters:

    /**
     * [getUuid description]
     * @return [type] [description]
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * [getName description]
     * @return [type] [description]
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * [getName description]
     * @return [type] [description]
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * [getCreatedOn description]
     * @return [type] [description]
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * [getUpdatedOn description]
     * @return [type] [description]
     */
    public function getUpdatedOn()
    {
        return $this->updatedOn;
    }
}
