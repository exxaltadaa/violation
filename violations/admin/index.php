<?php

session_start();
    if($_SESSION['role'] != "Администратор"){
        header("Location: ../profile/");
        exit;
    }
include "../inc/header.php";
include "../function/function.php";
?>

<div class="h_2">
    <p class="p_1">Панель администратора</p>     
    <?php echo fnGetTablAdmin();?>
    
    
    
</div>
