<?php


class Building
{
    private $pk;
    private $name;

    /**
     * Building constructor.
     * @param $pk
     * @param $name
     */
    public function __construct($pk, $name)
    {
        $this->pk = $pk;
        $this->name = $name;
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