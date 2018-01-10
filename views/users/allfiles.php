<?php
$title = 'Список файлов';
$activeMenu = 5;
require_once 'views/header.php'
?>
<div class="container wrap">
    <h2>Все файли</h2>
    <table class="table table-bordered">
        <tr>
            <th>Название файла</th>
            <th>Фотография</th>
        </tr>
        <?php foreach ($data as $user) :?>
            <tr>
                <td><?=$user['photo'];?></td>
                <td><img style='max-width: 100px' src="/<?= $user['photo'];?>" alt=''></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div><!-- /.container -->
<?php require_once 'views/footer.php' ?>
