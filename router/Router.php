<?php

class Router {
    private $get;
    private $post;
    private $route;
    private $root;
    private $controller_list;
    private $anonymous_list;
    private $controller;
    private $controller_name;
    
    function __construct($get, $post, $self, $url) {
        $this->get = $_GET;
        $this->post = $post;
        $this->controller_list = ['index', 'login', 'CreateUser', 'ListUsers', 'ModifyUser','UpdateBuilding', 'CreateBuilding', 'ListBuildings', 'CreateCommunication', 'ListCommunications'];
        $this->controller_name = false;
        $this->anonymous_list = ['login', 'CreateUser'];
        $this->controller = false;
        $this->root = $this->parseRoot($self);
        $this->route = $this->parseURL($url);
        $this->run();
    }
    
    private function parseRoot($self) {
        return str_replace('index.php', '', $self);
    }
    
    private function parseURL($url) {
        $path = str_replace($this->root, '', $url);
        $path = explode('/', $path);
        if($path && $path[0]) {
            if(strpos($path[0],"?") !== false){
                $path[0]=substr($path[0],0,strpos($path[0],"?"));
            }
        }
        $controller = false;
        if($path && count($path) && strlen($path[0])) {
            if($path[0] == 'logout'){
                session_destroy();
                header('Location: login');
            }
            if (SecurityHelper::getSession()) {
                $controller = $path[0];
            } else {
                $controller = 'login';
            }
        } else if(count($path) && !strlen($path[0])) {
            if (SecurityHelper::getSession()) {
                $controller = 'ListCommunications';
            } else {
                $controller = 'login';
            }

        }
        if($controller && in_array($controller, $this->controller_list)) {
            $this->controller_name = ucfirst($controller.'Controller');
        }
        return $path;
        
    }
    
    private function run() {
        if($this->controller_name) {

            $this->controller = new $this->controller_name($this->get, $this->post, $this->route);
        }
    }
}