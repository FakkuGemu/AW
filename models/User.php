<?php
require_once '../Model.php';

class User extends Model{
    public $login;
    private $email;
    public $passwordHash;

    public function __construct($login, $email, $passwordHash){
        $this->login = $login;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
    }

    public function save()  {
        DB::get()->users->drop();
        $response = DB::get()->users->insertOne([
            'login' => $this->login,
            'email' => $this->email,
            'password' => $this->passwordHash,
        ]);
        $this->_id = $response->getInsertedId();
    }

    public static function getOne($query = []) {
        $user = DB::get()->users->findOne($query);
        return $user;
    }

    static public function get($query = []) {
        $object = DB::get()->users->findOne($query);
        if ($object) {
            return true;
        } else {
            return false;
        }
    }

}