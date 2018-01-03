<?php

namespace App;

class Users extends MainController
{
    use Message;
    public function registers()
    {
        $this->view->render('users/register');
        //data from register form
        $go = $_POST['go'];
        $login = strip_tags($_POST['login']);
        $pas = strip_tags($_POST['pas']);
        $pas2 = strip_tags($_POST['pas2']);
        if (isset($go)) {
            if ($login != '' && $pas != '') {
                if ($pas == $pas2) {
                    $useModel = new User();
                    $row = $useModel->getLogin($login);
                    if (count($row) == 0) {
                        $useModel->register($login, $pas);
                    }
                }
            }
        }
    }

    public function auto()
    {
        $login = strip_tags($_POST['login']);
        $pas = strip_tags($_POST['pas']);
        if ($login != '' && $pas != '') {
            $useModel = new User();
            $row = $useModel->getLogin($login);
            if (count($row) == 1) {
                $pasDB = $useModel->autorise($login);
                if (password_verify($pas, $pasDB)) {
                    $val = $login;
                    $dataSess = Session::getInstance();
                    $dataSess->login = $val;
                    $data['log'] = $dataSess;
                    $this->view->render('users/auto', $data);
                }
            }
        }
    }























//    public function index()
//    {
//        echo "users index";
//    }
//
//    public function create()
//    {
//        echo "User create interface";
//    }
//
//    public function nelza($id, $id2)
//    {
//        echo 'nelzia';
//    }
//
//    public function showUserList()
//    {
//        $users_model = new User();
//        $users = $users_model->all();
//
//        for ($i = 0; $i < count($users); $i++) {
//            $users[$i] = $users[$i] . "changed";
//        }
//
//        $data['users'] = $users;
//        $data['username'] = 'Igor';
//        $this->view->render('users/userlist', $data);
//    }
//
//    public function showFirstUser()
//    {
//
//        $users_model = new User();
//        $user = $users_model->first();
//
//        $data['user'] = $user;
//        $this->view->render('users/userfirst', $data);
//    }
}