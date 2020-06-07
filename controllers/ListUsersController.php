<?php


class ListUsersController
{
    private $dao;
    private $view;
    private $data=null;
    function __construct($get, $post, $route) {
        $this->dao = new UserDAO();
        $this->view = new ListUserPageView();
        if(SecurityHelper::isAdmin()){
//        var_dump('route', $route, 'post', $post);
            if($get && isset($get['delete'])) {
                $this->delete($get['delete']);
            }
            $this->data=$this->dao->fetchAll();
            $this->displayOne($this->data);
        }else{
            header('Location: /MyBuilding/');
        }
    }

    function displayOne($data) {
        echo $this->view->displayOne($data);
    }

    function delete($id) {
        $this->dao->delete($id);
    }
}