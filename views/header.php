<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?? ''; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">MVC</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php if (isset($_SESSION['login'])) : ?>
                    <li <?php echo ($activeMenu == 1) ? "class='active'" : ""; ?>>
                        <a href="auto">Авторизация</a>
                    </li>
                    <li <?php echo ($activeMenu == 2) ? "class='active'" : ""; ?>>
                        <a href="registers">Регистрация</a>
                    </li>
                    <li <?php echo ($activeMenu == 3) ? "class='active'" : ""; ?>>
                        <a href="profile">Профиль</a>
                    </li>
                    <li <?php echo ($activeMenu == 4) ? "class='active'" : ""; ?>>
                        <a href="userlist">Список пользователей</a>
                    </li>
                    <li <?php echo ($activeMenu == 5) ? "class='active'" : ""; ?>>
                        <a href="files">Список файлов</a>
                    </li>
                    <li <?php echo ($activeMenu == 6) ? "class='active'" : ""; ?>>
                        <a href="createuser">Админ</a>
                    </li>
                <?php else : ?>
                    <li <?php echo ($activeMenu == 1) ? "class='active'" : ""; ?>>
                        <a href="auto">Авторизация</a>
                    </li>
                    <li <?php echo ($activeMenu == 2) ? "class='active'" : ""; ?>>
                        <a href="registers">Регистрация</a>
                    </li>
                <?php endif; ?>
            </ul>
            <?php if (isset($_SESSION['login'])) : ?>
                <span class="navbar-brand" href="#">Привет <?= $_SESSION['login']; ?></span>
                <a class="navbar-brand" href="logout">Вийти</a>
            <?php endif; ?>

        </div><!--/.nav-collapse -->
    </div>
</nav>
