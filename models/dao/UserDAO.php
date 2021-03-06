<?php 

class UserDAO extends DAO {
    protected $table;
    protected $deleteBehaviour;
    protected $updateUserBehaviour;
    protected $properties;
    
    function __construct() {
        $this->deleteBehaviour = new HardDeleteBehaviour();
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
            $data['role'],
            $data['appartment_number'],
            $data['FK_building']
        );
    }

    function login($data) {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE email = ? ");
            $statement->execute([$data['email']]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if(password_verify($data['password'], $result['password'])) {
                return $this->create($result);
            }
        } catch (PDOException $e) {
            print $e->getMessage();
        }
    }
}