<?php 

class UserDAO extends DAO {
    protected $table;
    protected $deleteBehaviour;
    protected $properties;
    
    function __construct() {
        $this->deleteBehaviour = new SoftDeleteBehaviour();
        $this->table = 'products'; 
        $this->properties = ['pk', 'name', 'price', 'vat', 'price_vat', 'price_total', 'quantity'];
    }
}