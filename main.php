<?php
require "database.php";
require "functions.php";

if (!empty($_GET)) {
    $width = filter_input(INPUT_GET,'width', FILTER_SANITIZE_NUMBER_INT);
    $height = filter_input(INPUT_GET,'height', FILTER_SANITIZE_NUMBER_INT);
    
    $data = ['width' => $width, 'height' => $height];

    $carpets = $db->read('carpets', $data);
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

<? if (!empty($_GET)): ?>
    <? if (!empty($carpets) && is_array($carpets)): ?>
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
<? endif; ?>

<a href="add.php">Gilam qo'shish</a>