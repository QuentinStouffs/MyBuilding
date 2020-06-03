<?php


class LoginController
{
    private $dao;
    private $view;
    private $data=null;
    function __construct($get, $post, $route) {
        $this->dao = new UserDAO();
        $this->view = new LoginPageView();
//        var_dump('route', $route, 'post', $post);
        if($post && isset($post['email'])) {
            $user = $this->dao->login($post);
            new SecurityHelper($user);
        }

        $this->displayOne($this->data);
    }

    function displayOne($data) {
        echo $this->view->displayOne($data);
    }


    function delete($id) {
        $this->dao->delete($id);
        echo "AUREVOIR";
    }

    private function createUser($data)
    {
        if($this->dao->save($data)){
            return true;
        }
        return false;
    }
}