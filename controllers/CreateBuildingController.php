<?php


class CreateBuildingController
{
    private $dao;
    private $view;
    private $data=null;
    function __construct($get, $post, $route) {
        if(SecurityHelper::isAdmin()){
            $this->dao = new BuildingDAO();
            $this->view = new CreateBuildingPageView();
            if($post && isset($post['create'])) {
                if($post['name'] == $post['name']) {
                    if($this->createBuilding($post)) {
                        $this->data = ['success' => 'success'];
                    }
                }else{
                    $this->data=['fail' => 'Erreur'];
                }
            }
    //        var_dump('route', $route, 'post', $post);

            $this->displayOne($this->data);

        }else{
            header('Location: /MyBuilding/');
        }
    }

    function displayOne($data) {
        echo $this->view->displayOne($data);
    }


    private function createBuilding($data)
    {
        if($this->dao->save($data)){
            return true;
        }
        return false;
    }
}
