<?php
$title = 'Регистрация';
$activeMenu = 2;
require_once 'views/header.php'
?>
<div class="container wrap">
    <div class="form-container register">
        <?php echo $data['olo'];
//            echo $_SESSION['login'];
        ?>
        <form class="form-horizontal" action="" method="post">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="login" placeholder="Логин" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="pas" placeholder="Пароль" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword4" class="col-sm-2 control-label">Пароль (Повтор)</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="pas2" placeholder="Пароль" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="go" class="btn btn-default btn__reg">Зарегистрироваться</button>
                    <br><br>
                    Зарегистрированы? <a href="auto">Авторизируйтесь</a>
                </div>
            </div>
        </form>
    </div>

</div><!-- /.container -->

<?php require_once 'views/footer.php' ?>
