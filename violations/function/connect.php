<?php

    $connect = new mysqli("localhost", "root", "", "violations");

    if($connect->connect_error){
        die ("Ошибка подключения к базе данных");
    }

?>

