<?php
//dao = data acces object
//dal = data access layer

//include
class ProductDAO extends DAO {
    protected $table;
    protected $deleteBehaviour;
    protected $properties;
    
    function __construct() {
        $this->deleteBehaviour = new SoftDeleteBehaviour();
        $this->table = 'products'; 
        $this->properties = ['pk', 'name', 'price', 'vat', 'price_vat', 'price_total', 'quantity'];
        parent::__construct();
    }
    
    function create($data) {
        //$data['vat'] ? $data['vat] : 0;
        //condition ? si oui : si non;
        
        return new Product(
            $data['pk'],
            $data['name'],
            $data['price'],
            $data['vat'] ? $data['vat'] : 0,
            $data['price_vat'] ? $data['price_vat'] : 0,
            $data['price_total'] ? $data['price_total'] : 0,
            $data['quantity']
        );
    }
    
    
}
