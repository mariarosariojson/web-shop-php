<?php

class User
{
    public $id;
    public $username;
    public $role;

    private $password_hash;

    public function __construct($username, $role, $id = 0)
    {
        if ($id > 0) {
            $this->id = $id;
        }
        $this->username = $username;
        $this->role = $role;
    }

    function hash_password($password)
    {
        $this->password_hash = password_hash($password, null);
    }

    public function get_password_hash()
    {
        return $this->password_hash;
    }

    public function set_password_hash($password_hash)
    {
        $this->password_hash = $password_hash;
    }

    public function test_password($password)
    {
        $correct = password_verify($password, $this->password_hash);
        return $correct;
    }
}
