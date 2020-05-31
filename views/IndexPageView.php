<?php 

class IndexPageView {
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
    
    function displayOne($product) {
        $this->template($product);
        return $this->render;
    }
    
    function template($data) {
        $this->page = $this->generateHeader();
        if(is_array($data)) {
            $this->page .= $this->templateMultiple($data);
        } else {
             $this->page .= $this->templateSingle($data);
        }
        $this->page .= $this->generateFooter();
        $this->render = $this->generateShell();
    }
    
    function templateSingle($product) {
        return $this->generateOne($product);
    }
    
    function templateMultiple($product_list) {
        $buffer = $this->generateEmptyFormToutNul();
        $buffer .=  $this->generateTable($product_list);
        return $buffer;
    }
    
    function generateEmptyFormToutNul() {
        ob_start();
            include 'views/template/formtoutnul.php';
        return ob_get_clean();
    }
    
    function generateShell() {
        ob_start();
            include 'views/template/shell.php';
        return ob_get_clean();
    }
    
    function generateTable($product_list) {
        ob_start();
            include 'views/template/product_table.php';
        return ob_get_clean();
    }
    
    function generateOne($product) {
        ob_start();
            include 'views/template/product_single.php';
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