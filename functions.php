<?php

require_once "database.php";

function dd($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";

    die();
}
