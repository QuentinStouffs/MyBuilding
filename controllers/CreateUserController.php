<?php


class CreateUserController
{
    private $dao;
    private $view;
    private $data=null;
    function __construct($get, $post, $route) {
        $this->dao = new UserDAO();
        $this->view = new CreateUserPageView();
        if($post && isset($post['create'])) {
            $brah = $this->createUser($post);
            if($brah){
                $this->data = ['success' => 'success'];
            }
        }
//        var_dump('route', $route, 'post', $post);
        if($post && isset($post['id']) && $route == 'delete') {
            $this->delete($post['id']);
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