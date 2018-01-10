<?php
$title = 'Админ';
$activeMenu = 6;
require_once 'views/header.php'
?>
<div class="container wrap">
    <h1>Создать пользивателя</h1>
    <div class="form-container register">
        <?php echo $data['olo'];
        ?>
        <form class="form-horizontal" action="" method="post">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Пользователь</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="login" placeholder="Пользователь" required>
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
                    <button type="submit" name="go" class="btn btn-default btn__reg">Создать</button>
                </div>
            </div>
        </form>
    </div>

</div><!-- /.container -->

<?php require_once 'views/footer.php' ?>
