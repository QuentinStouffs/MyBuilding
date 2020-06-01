<?php


class ModifyUserController
{
    private $dao;
    private $view;
    private $data=null;
    function __construct($get, $post, $route) {
        $this->dao = new UserDAO();
        $this->view = new ModifyUserPageView();
        if(isset($get) && isset($get['pk'])){
            $this->data = $this->dao->fetch($get['pk']);
        }

        if($post && isset($post['modify'])) {
            if($post['password'] != '' && $post['password'] == $post['checkPassword']) {
                $this->dao->__set('updateUserBehaviour', new UpdateUserWithPasswordBehaviour());
            }elseif ($post['password'] == ''){
                $this->dao->__set('updateUserBehaviour', new UpdateUserWithoutPasswordBehaviour());

            }
            $rah=$this->modifyUser($post);
                var_dump($rah);
            if ($rah) {
                $this->data = $this->dao->fetch($post['pk']);
            } else{
                $this->data=['fail' => 'Les mots de passe ne correspondent pas'];
            }
        }
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
    private function modifyUser($data)
    {
        if($this->dao->updateUserBehaviour->update($data)){
            return true;
        }else{
            return false;
        }
    }
}