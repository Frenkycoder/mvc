<?php
$title = 'Авторизация';
$activeMenu = 1;
require_once 'views/header.php'
?>
<div class="container wrap">
Привет, <?=$data['username']?>

Список пользователей

<?php
foreach ($data['users'] as $user) :
?>
    <li>
        <?=$user?></li>
<?php endforeach; ?>

</div><!-- /.container -->

<?php require_once 'views/footer.php' ?>
