<?php
require "database.php";

if (!empty($_GET)) {
    $width = $_GET['width'];
    $height = $_GET['height'];

    $carpets = $db->read('carpets', ['width' => $width, 'height' => $height]);
}


?>
<h1>Gilam qidirish</h1>

<form action="main.php" method="GET">
    <label for="">Eni</label>
    <input type="text" name="width">
    <label for="">Bo'yi</label>
    <input type="text" name="height">
    <button type="submit">Qidirish</button>
</form>

<? if (isset($carpets)): ?>
    <table>
        <tr>
            <th>Nomi</th>
            <th>Narxi</th>
            <th>Soni</th>
            <th>Amal</th>
        </tr>
        <?php foreach ($carpets as $carpet): ?>
            <tr>
                <td><?= $carpet['title'] ?></td>
                <td><?= $carpet['price'] ?></td>
                <td><?= $carpet['qty'] ?></td>
                <td>
                    <form action="buy.php" method="post">
                        <input type="text" name="id" value="<?= $carpet['id'] ?>" hidden>
                        <button type="submit">Sotish</button>
                    </form>
                </td>
            </tr>


        <?php endforeach; ?>
    </table>

<? else: ?>
    <p>
        Bunaqa gilam yoq
    </p>
<? endif; ?>

<a href="add.php">Gilam qo'shish</a>