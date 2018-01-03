<?php
$title = 'Авторизация';
$activeMenu = 1;
require_once 'views/header.php'
?>
<div class="container wrap">
    <?php echo $data['login']; ?>
    <div class="form-container autorize">
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label for="inputEmail1" class="col-sm-2 control-label">Логин</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="login" placeholder="Логин">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword1" class="col-sm-2 control-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="pas" placeholder="Пароль">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="auto" class="btn btn-default auto" value="Войти">
                    <br><br>
                    Нет аккаунта? <a href="reg.php">Зарегистрируйтесь</a>
                </div>
            </div>
        </form>
    </div>

</div><!-- /.container -->

<?php require_once 'views/footer.php' ?>
