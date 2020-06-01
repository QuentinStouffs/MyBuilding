<?php


class User
{
    public $pk;
    public $name;
    public $email;
    public $password;
    public $role;
    public $appartment_number;
    public $building;

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

    static function passwordEncrypt ($password) {
        return password_hash($password, PASSWORD_DEFAULT);
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