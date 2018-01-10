<?php
$title = 'Список пользователей';
$activeMenu = 4;
require_once 'views/header.php'
?>
<div class="container wrap">
    <h2>Все пользиватели</h2>
    http://mvc/users/userlist - Сортировка по возростанию
    <br>
    http://mvc/users/userlist/des - Сортировка по убиванию
    <table class="table table-bordered">
        <tr>
            <th>Пользователь(логин)</th>
            <th>Имя</th>
            <th>возраст</th>
            <th>описание</th>
            <th>Фотография</th>
        </tr>
        <?php foreach ($data as $user) : ?>
            <tr>
                <td><?= $user['login'];?></td>
                <td><?= $user['name'];?></td>
                <td><?= $user['age'];?></td>
                <td><?= $user['description'];?></td>
                <td><img style='max-width: 100px' src="/<?= $user['photo'];?>" alt=''></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div><!-- /.container -->
<?php require_once 'views/footer.php' ?>
