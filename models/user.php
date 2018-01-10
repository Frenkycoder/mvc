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

    public function reg($login, $pas)
    {
        $pas = password_hash($pas, PASSWORD_DEFAULT);
        $ps = $this->connect->prepare("INSERT INTO users (login, password) VALUES (:login, :password)");
        $ps->bindParam(':login', $login);
        $ps->bindParam(':password', $pas);
        $ps->execute();
    }

    public function register($go, $login, $pas, $pas2)
    {
        if (isset($go)) {
            if ($login != '' && $pas != '') {
                if ($pas == $pas2) {
                    $useModel = new User();
                    $row = $useModel->getLogin($login);
                    if (count($row) == 0) {
                        $useModel->reg($login, $pas);
                        $data['olo'] = $login . ' поздравляем, Ви зарегестрировались';
                        return $data;
                    } else {
                        $data['olo'] = 'Такой юзер существует';
                        return $data;
                    }
                } else {
                    $data['olo'] = 'Пароли не совпадают';
                    return $data;
                }
            } else {
                $data['olo'] = 'Введите данние';
                return $data;
            }
        }
    }

    public function auto($go, $login, $pas)
    {
        if (isset($go)) {
            if ($login != '' && $pas != '') {
                $useModel = new User();
                $row = $useModel->getLogin($login);
                if (count($row) == 1) {
                    $pasDB = $useModel->autorise($login);
                    if (password_verify($pas, $pasDB)) {
                        $data['log'] = $login;
                        $_SESSION['login'] = $data['log'];
                        return $data;
                    } else {
                        $data['log'] = 'Пароль неверний';
                        return $data;
                    }
                } else {
                    $data['log'] = 'Такого логина нет';
                    return $data;
                }
            } else {
                $data['log'] = 'Введите данние';
                return $data;
            }
        }
    }

    public function autorise($login)
    {
        $check = $this->connect->prepare("SELECT password FROM users WHERE login=:login");
        $check->execute(array(':login' => $login));
        $row = $check->fetch(PDO::FETCH_ASSOC);
        $pasDB = $row['password'];
        return $pasDB;
    }

    public function prof($go, $name, $age, $desc)
    {
        if (isset($go)) {
            if ($name != '' && $age != '' && $desc != '') {
                //Узнаем ID записи для именования картинки
                $selID = $this->connect->prepare("SELECT id FROM users WHERE login=:login");
                $selID->execute(array(':login' => $_SESSION['login']));
                $row = $selID->fetch(PDO::FETCH_ASSOC);
                $IDrow = $row['id'];
                //проверка фото
                try {
                    $file = empty($_FILES['photo']) ? null : $_FILES['photo'];
                    if (!isset($file['error']) || is_array($file['error'])) {
                        throw new \RuntimeException('Invalid parameters.');
                    }
                    //Проверка на ошибки
                    switch ($file['error']) {
                        case UPLOAD_ERR_OK:
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            throw new \RuntimeException('Файл не отправлен.');
                        case UPLOAD_ERR_INI_SIZE:
                        case UPLOAD_ERR_FORM_SIZE:
                            throw new \RuntimeException('Перевишен лимит размера файла.');
                        default:
                            throw new \RuntimeException('Неизвсетние ошибки.');
                    }
                    //Проверка размеров файла
                    if ($file['size'] > 10485760) {
                        throw new \RuntimeException('Перевишен размер файла, файл должен бить менше 10 Мегабайт');
                    } elseif ($file['size'] == 0) {
                        throw new \RuntimeException('Файл пустой');
                    }
                    //Проверка расширения файла
                    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                    $img_type = ['png', 'jpg', 'jpeg', 'gif'];
                    if (!in_array($ext, $img_type)) {
                        throw new \RuntimeException("Ето не картинка,
                         только такие формати - 'png', 'jpg', 'jpeg', 'gif'");
                    }
                    //Изменение имени картинки
                    $cut = explode(".", $file['name']);
                    $fileName = $IDrow . '.' . end($cut);
                    if (!move_uploaded_file($file['tmp_name'], 'uploads/' . $fileName)) {
                        throw new \RuntimeException('Не вишло загрузить файл');
                    }
                    $fileDest = 'uploads/' . $fileName;
                } catch (\RuntimeException $e) {
                    echo $e->getMessage();
                }
                //Обновляем данние профиля
                $prof = $this->connect->prepare("UPDATE users SET name=:username, age=:age,description=:description, photo=:photo WHERE login=:login");
                $prof->execute(array(':username' => $name, ':age' => $age, ':description' => $desc,
                    ':login' => $_SESSION['login'], ':photo' => $fileDest));
                $data['profile'] = "Файл успешно загружен";
                return $data;
            } else {
                $data['profile'] = "Пожалуйста, заполните все поля";
                return $data;
            }
        }
    }

    public function showFiles()
    {
        $show = $this->connect->prepare("SELECT photo FROM users WHERE photo!=''");
        $show->execute();
        $row = $show->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function showUsers()
    {
        $show = $this->connect->prepare("SELECT * FROM users WHERE age!=''");
        $show->execute();
        $arr = $show->fetchAll(PDO::FETCH_ASSOC);
        return $arr;
    }

    public function createUser($go, $login, $pas, $pas2)
    {
        if (isset($go)) {
            if ($login != '' && $pas != '') {
                if ($pas == $pas2) {
                    $useModel = new User();
                    $row = $useModel->getLogin($login);
                    if (count($row) == 0) {
                        $useModel->reg($login, $pas);
                        $data['olo'] = $_SESSION['login'] . ' поздравляем, Ви создали пользователя ' . $login;
                        return $data;
                    } else {
                        $data['olo'] = 'Такой пользователя существует';
                        return $data;
                    }
                } else {
                    $data['olo'] = 'Пароли не совпадают';
                    return $data;
                }
            } else {
                $data['olo'] = 'Введите данние';
                return $data;
            }
        }
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
