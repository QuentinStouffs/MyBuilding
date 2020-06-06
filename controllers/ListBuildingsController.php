<?php


class ListBuildingsController
{
    private $dao;
    private $view;
    private $data=null;
    function __construct($get, $post, $route) {
        $this->dao = new BuildingDAO();
        $this->view = new ListBuildingsPageView();
//        var_dump('route', $route, 'post', $post);
        if($get && isset($get['delete'])) {
            $this->delete($get['delete']);
        }
        $this->data=$this->dao->fetchAll();
        $this->displayOne($this->data);
    }

    function displayOne($data) {
        echo $this->view->displayOne($data);
    }


    function delete($id) {
        $this->dao->delete($id);
        echo "AUREVOIR";
    }
}