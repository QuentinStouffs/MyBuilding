<?php


class RenderPage
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

    function template($data, $tmpl) {
        $this->page = $this->generatePart('views/template/header.php');
        if(is_array($data)) {
            $this->page .= $this->templateMultiple($data);
        } else {
            $this->page .= $this->generatePart($tmpl, $data);
        }
        $this->page .= $this->generatePart('views/template/footer.php');
        $this->render = $this->generatePart('views/template/shell.php');
    }

    function templateMultiple($product_list) {
        $buffer = $this->generateEmptyFormToutNul();
        $buffer .=  $this->generateTable($product_list);
        return $buffer;
    }

    function generatePart($part, $data=null) {
        ob_start();
        include $part;
        return ob_get_clean();
    }

    function generateEmptyFormToutNul() {
        ob_start();
        include 'views/template/formtoutnul.php';
        return ob_get_clean();
    }

    function generateTable($product_list) {
        ob_start();
        include 'views/template/product_table.php';
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