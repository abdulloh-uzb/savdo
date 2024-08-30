<?php

require_once "database.php";


if (!empty($_POST)) {

    $title = $_POST['title'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $height = $_POST['height'];
    $width = $_POST['width'];
    $id = rand(10, 100);
    
    $data = [
        'title'=>$title,
        'qty'=>$qty,
        'price'=>$price,
        'height'=>$height,
        'width'=>$width,
        'id' => $id
    ];
    $db->create('carpets', $data);

}

?>



<form action="add.php" method="post">

    <label for="">Nomi</label>
    <input type="text" name="title">
    <br>

    <label for="">Soni</label>
    <input type="text" name="qty">
    <br>

    <label for="">Narxi</label>
    <input type="text" name="price">
    <br>

    <label for="">Bo'yi</label>
    <input type="number" name="height">
    <br>

    <label for="">Eni</label>
    <input type="number" name="width">
    <br>

    <button type="submit">Qo'shish</button>

</form>