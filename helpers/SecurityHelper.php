<?php


class SecurityHelper
{
    private $session;
    /**
     * SecurityHelper constructor.
     * @param $cookie
     */
    public function __construct($user)
    {
        $this->sessionLogin($user);
    }

    public function sessionLogin($user) {
        $_SESSION['pk'] = $user->__get('pk');
        $_SESSION['name']=$user->__get('name');
        $_SESSION['email']=$user->__get('email');
        $_SESSION['appartment_number']=$user->__get('appartment_number');
        $_SESSION['role']=$user->__get('role');
        $_SESSION['FK_building']=$user->__get('building');
        $this->session = $_SESSION;
    }

    public static function getSession() {
        return $_SESSION;
    }
    public static function isAdmin() {
        return (isset($_SESSION['role'])) && ($_SESSION['role'] == "admin");
    }

    function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }
    }
}