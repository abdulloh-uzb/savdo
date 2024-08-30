<?php
require "database.php";
require "functions.php";

if (isset($_POST)) {
    $id = $_POST['id'];
    $price = $_POST['price'];
    $carpet = $db->read('carpets', ['id' => $id]);
    if ($carpet[0]['qty'] > 0) {
        $qty = $carpet[0]['qty'] - 1;
        $db->update("carpets", ['qty' => $qty], ['id' => $id]);    
        $db->create('trades', [
            'carpet_id' => $carpet[0]['id'],
            'price' => $price,
            'date' => date('Y-m-d H:i:s') ,
        ]);
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
