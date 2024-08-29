<?php
require "database.php";
require "functions.php";

if (isset($_POST)) {
    $id = $_POST['id'];
    $carpet = $db->read('carpets', ['id' => $id]);
    $qty = $carpet[0]['qty'] - 1;
    $db->update("carpets", ['qty' => $qty], ['id' => $id]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

