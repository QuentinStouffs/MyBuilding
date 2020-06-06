<?php


class LoginPageView extends PageView
{
    function __construct() {
        PageView::__construct();
    }

    function displayPage($product_list) {
        $this->template($product_list);
        return $this->render;
    }

    function displayOne($data) {
        $this->template($data);
        return $this->render;
    }

    function template($data) {
        $this->render = $this->templateSingle($data);
    }

    function templateSingle($data) {
        return $this->generateOne($data);
    }


    function generateOne($data) {
        ob_start();
        include 'views/template/login.php';
        return ob_get_clean();
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