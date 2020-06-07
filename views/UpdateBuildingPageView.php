<?php


class UpdateBuildingPageView extends PageView
{

    function __construct() {
        Parent::__construct();
    }


    function displayOne($data) {
        $this->template($data);
        return $this->render;
    }

    function generateOne($data) {
        ob_start();
        include 'views/template/updateBuildingForm.php';
        return ob_get_clean();
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