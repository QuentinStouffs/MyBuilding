<?php


class CreateCommunicationController
{
    private $dao;
    private $view;
    private $data=null;
    function __construct($get, $post, $route) {
        var_dump($post);
        $this->dao = new CommunicationDAO();
        $this->view = new CreateCommunicationPageView();
        $buildingDao = new BuildingDAO();
        $this->data['buildings'] = $buildingDao->fetchAll();
        if($post && isset($post['create'])) {
            if($this->createCommunication($post)){
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
    }

    private function createCommunication($data)
    {
        if($this->dao->save($data)){
            return true;
        }
        return false;
    }
}