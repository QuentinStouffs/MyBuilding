<?php


class UpdateBuildingController
{
    private $dao;
    private $view;
    private $data=null;
    function __construct($get, $post, $route) {
        if(SecurityHelper::isAdmin()){
            $this->dao = new BuildingDAO();
            $this->view = new UpdateBuildingPageView();
            if(isset($get) && isset($get['pk'])){
                $this->data['user'] = $this->dao->fetch($get['pk']);
            }

            if($post && isset($post['modify'])) {

                $rah=$this->modifyBuilding($post);
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

    private function modifyBuilding($data)
    {
        if($this->dao->update($data)){
            return true;
        }else{
            return false;
        }
    }
}