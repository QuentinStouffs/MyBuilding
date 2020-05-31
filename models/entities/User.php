<?php


class User
{
    private $pk;
    private $name;
    private $email;
    private $password;
    private $role;
    private $appartment_number;
    private $building;

    /**
     * User constructor.
     * @param $pk
     * @param $name
     * @param $email
     * @param $password
     * @param $role
     * @param $appartment_number
     * @param $building
     */
    public function __construct($pk, $name, $email, $password, $role, $appartment_number, $building)
    {
        $this->pk = $pk;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->appartment_number = $appartment_number;
        $this->building = $building;
    }


    function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}