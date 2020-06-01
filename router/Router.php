<?php

class Router {
    private $get;
    private $post;
    private $route;
    private $root;
    private $controller_list;
    private $controller;
    private $controller_name;
    
    function __construct($get, $post, $self, $url) {
        $this->get = $_GET;
        $this->post = $post;
        $this->controller_list = ['index', 'CreateUser', 'ListUsers', 'ModifyUser'];
        $this->controller_name = false;
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
        // Todo: Ce truc marche pas et je sais pas ce qu'il est sensé faire...
        if($path && $path[0]) {
            if(strpos($path[0],"?") !== false){
                $path[0]=substr($path[0],0,strpos($path[0],"?"));
            }
        }
        $controller = false;

        if($path && count($path) && strlen($path[0])) {
            $controller = $path[0];
        } else if(count($path) && !strlen($path[0])) {
            $controller = 'index';
        }

        if($controller && in_array($controller, $this->controller_list)) {
            $this->controller_name = ucfirst($controller.'Controller');
        }
        //nettoyer le path pour n'y laisser que ce qui est important
        //return $path[3];
        return $path;
        
    }
    
    private function run() {
        if($this->controller_name) {

            $this->controller = new $this->controller_name($this->get, $this->post, $this->route);
        }
    }
}