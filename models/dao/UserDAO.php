<?php 

class UserDAO extends DAO {
    protected $table;
    protected $deleteBehaviour;
    protected $updateUserBehaviour;
    protected $properties;
    
    function __construct() {
        $this->deleteBehaviour = new SoftDeleteBehaviour();
        $this->table = 'users';
        $this->properties = ['pk', 'name', 'email', 'password', 'role', 'appartment_number', 'FK_building'];
        parent::__construct();

    }

    static function create($data) {
        return new User(
            $data['pk'],
            $data['name'],
            $data['email'],
            User::passwordEncrypt($data['password']),
//            $data['role'],
            'resident',
            $data['appartment_number'],
//            $data['FK_building']
            2
        );
    }


}