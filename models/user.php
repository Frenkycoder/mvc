<?php

namespace App;

use \PDO;

class User extends MainModel
{
    public function getLogin($login)
    {
        $check = $this->connect->prepare("SELECT login FROM users WHERE login=:login");
        $check->execute(array(':login' => $login));
        $row = $check->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function register($login, $pas)
    {
        $pas = password_hash($pas, PASSWORD_DEFAULT);
        $ps = $this->connect->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
        $ps->bindParam(':login', $login);
        $ps->bindParam(':password', $pas);
        $ps->execute();
    }

    public function autorise($login)
    {
        $check = $this->connect->prepare("SELECT password FROM auto WHERE login=:login");
        $check->execute(array(':login' => $login));
        $row = $check->fetch(PDO::FETCH_ASSOC);
        $pasDB = $row['password'];
        return $pasDB;
    }















//    protected $users = [
//      'user1', 'user2', 'user3'
//    ];
//    public function all()
//    {
//        return $this->users;
//    }
//
//    public function first()
//    {
//        return $this->users[0];
//    }
//
//    public function get($id)
//    {
//        return $this->users[$id];
//    }
}
