<?php


class ListUserPageView
{
    private $page;
    private $render;

    function __construct() {
        $this->page = false;
        $this->render = false;
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
        $this->page = $this->generateHeader();
        $this->page .= $this->templateSingle($data);
        $this->page .= $this->generateFooter();
        $this->render = $this->generateShell();
    }

    function templateSingle($data) {
        return $this->generateOne($data);
    }

    function generateShell() {
        ob_start();
        include 'views/template/shell.php';
        return ob_get_clean();
    }

    function generateOne($data) {
        ob_start();
        include 'views/template/ListUsers.php';
        return ob_get_clean();
    }

    function generateHeader() {
        ob_start();
        include 'views/template/header.php';
        return ob_get_clean();
    }

    function generateFooter() {
        ob_start();
        include 'views/template/footer.php';
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