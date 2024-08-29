<?php
require "database.php";
require "functions.php";


$carpets = $db->read('carpets');
?>



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