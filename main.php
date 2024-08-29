<?php
require "database.php";

?>
<h1>Gilam qidirish</h1>
<form action="carpets.php" method="GET">
    <label for="">Eni</label>
    <input type="text" name="width">
    <label for="">Bo'yi</label>
    <input type="text" name="height">
    <button type="submit">Qidirish</button>
</form>


<a href="add.php">Gilam qo'shish</a>