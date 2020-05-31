<?php
class IndexController {
    private $dao;
    private $view;
    
    function __construct($get, $post, $route) {
        $this->dao = new ProductDAO();
        $this->view = new IndexPageView();
        
        var_dump('route', $route, 'post', $post);
        if($post && $post['id'] && $route == 'delete') {
            $this->delete($post['id']);
        }
        
        if($get && $get['id']) {
            $this->displayOne($get['id']);
        } else {
            $this->displayPage();
        }   
    }
    
    function displayOne($id) {
        echo $this->view->displayOne($this->dao->fetch($id));
    }
    
    function displayPage() {
        echo $this->view->displayPage($this->dao->fetchAll());
    }
    
    function delete($id) {
        $this->dao->delete($id);
        echo "AUREVOIR";
    }
}
