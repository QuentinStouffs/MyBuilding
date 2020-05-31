<?php 

class UserDAO extends DAO {
    protected $table;
    protected $deleteBehaviour;
    protected $properties;
    
    function __construct() {
        $this->deleteBehaviour = new SoftDeleteBehaviour();
        $this->table = 'users';
        $this->properties = ['pk', 'name', 'email', 'password', 'role', 'appartment_number', 'FK_building'];
        parent::__construct();

    }

    function create($data) {
        return new User(
            $data['pk'],
            $data['name'],
            $data['email'],
            $data['password'],
//            $data['role'],
            'resident',
            $data['appartment_number'],
//            $data['FK_building']
            2
        );
    }


}