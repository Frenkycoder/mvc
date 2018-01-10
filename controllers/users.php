<?php

namespace App;

class Users extends MainController
{
    use Message;

    public function logout()
    {
            session_destroy();
            header("Location: http://{$_SERVER['SERVER_NAME']}/users/auto");
            exit();
    }

    public function userlist($sort = 'asc')
    {
        $useModel = new User();
        $data = $useModel->showUsers();
        foreach ($data as $k => $v) {
            $age[$k] = $v['age'];
        }
        if ($sort == 'des') {
            $sort = SORT_DESC;
        } else {
            $sort = SORT_ASC;
        }
        array_multisort($age, $sort, $data);
        foreach ($data as &$item) {
            if ($item['age'] > 18) {
                $item['age'] = $item['age'] . ' Совершеннолетний';
            } else {
                $item['age'] = $item['age'] . ' Несовершеннолетний';
            }
        }
        unset($item);
        $this->view->render('users/showusers', $data);
    }
    public function files()
    {
        $useModel = new User();
        $data = $useModel->showFiles();
        $this->view->render('users/allfiles', $data);
    }
    public function registers()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $go = $_POST['go'];
            $login = strip_tags($_POST['login']);
            $pas = strip_tags($_POST['pas']);
            $pas2 = strip_tags($_POST['pas2']);
            $useModel = new User();
            $data = $useModel->register($go, $login, $pas, $pas2);
            $this->view->render('users/register', $data);
        } else {
            $this->view->render('users/register');
        }
    }

    public function createuser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $go = $_POST['go'];
            $login = strip_tags($_POST['login']);
            $pas = strip_tags($_POST['pas']);
            $pas2 = strip_tags($_POST['pas2']);
            $useModel = new User();
            $data = $useModel->createUser($go, $login, $pas, $pas2);
            $this->view->render('users/usercreate', $data);
        } else {
            $this->view->render('users/usercreate');
        }
    }

    public function auto()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $go = $_POST['auto'];
            $login = strip_tags($_POST['login']);
            $pas = strip_tags($_POST['pas']);
            $useModel = new User();
            $data = $useModel->auto($go, $login, $pas);
            $this->view->render('users/auto', $data);
        } else {
            $this->view->render('users/auto');
        }
    }

    public function profile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $go = $_POST['prof'];
            $name = strip_tags($_POST['name']);
            $name = (string)$name;
            $age = strip_tags($_POST['age']);
            $age = preg_replace('/[^0-9]/', '', $age);
            $age = (int)$age;
            $desc = strip_tags($_POST['desc']);
            $useModel = new User();
            $data = $useModel->prof($go, $name, $age, $desc);
            $this->view->render('users/profile', $data);
        } else {
            $this->view->render('users/profile');
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