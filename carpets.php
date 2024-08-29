<?php
require "database.php";
require "functions.php";

if (!empty($_GET)) {
    $width = $_GET['width'];
    $height = $_GET['height'];

    $carpets = $db->read('carpets', ['width' => $width, 'height' => $height]);
}

?>

<ul>
    <? if (isset($carpets)): ?>
        <?php foreach ($carpets as $carpet): ?>
            <li>
                <span><?= $carpet['title'] ?></span>
                <form action="buy.php" method="post">
                    <input type="text" name="id" value="<?= $carpet['id'] ?>" hidden>
                    <button type="submit">Sotish</button>
                </form>
            </li>
        <?php endforeach; ?>
    <? else: ?>
        <p>
            Bunaqa gilam yoq
        </p>
    <? endif; ?>
</ul>