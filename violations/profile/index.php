<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: ../auth/");
    exit;
}
include "../inc/header.php";
include "../function/function.php";
?>

<div class="h_2">
    <p class="p_1">Личный кабинет</p> 
    <?php 
        echo fnGetProfile($_SESSION['login']); 
        echo fnGetTablProfile($_SESSION['login']);
    ?>
    <p></p>
    
    <a href="../violation/">Подать заявление</a>
    
    
</div>
