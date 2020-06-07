<?php


class ListCommunicationsPageView extends PageView
{
    public function __construct()
    {
        Parent::__construct();
    }

    function displayPage($product_list) {
        $this->template($product_list);
        return $this->render;
    }

    function displayOne($data) {
        $this->template($data);
        return $this->render;
    }

    function generateOne($data) {
        ob_start();
        include 'views/template/listCommunications.php';
        return ob_get_clean();
    }

    function templateSingle($data) {
        return $this->generateOne($data);
    }
}