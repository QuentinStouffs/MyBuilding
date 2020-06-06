<?php


class ModifyUserPageView extends PageView
{

    function __construct() {
        Parent::__construct();
    }


    function displayOne($data) {
        $this->template($data);
        return $this->render;
    }

    function templateSingle($data) {
        return $this->generateOne($data);
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