<?php
session_start();
if(isset($_SESSION['login'])){
    header("Location:../profile/");
    exit;
}
include "../inc/header.php";
?>

<div class="h_2">
    <?php
        if(isset($_GET['message'])){
            echo "<div class='message'>
            {$_GET['message']}
            </div>";
        }
    ?>
    <p class="p_1">Вход</p>  
    <form action="../admin/controllers/login.php" method="post">
        <div>
            <label for="login">Ваш логин</label>
            <input type="text" id="login" name="login">
        </div>
        <div>
            <label for="password">Ваш пароль</label>
            <input type="password" id="passworb" name="password">
        </div>
        <input type="submit" value="Войти">
    </form>
</div>
