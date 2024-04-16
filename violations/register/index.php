<?php
session_start();
include "../inc/header.php";
?>

<div class="h_2">
    <p class="p_1">Регистрация</p>  
    <form action="../admin/controllers/regisration.php" method="post">
        <div>
            <label for="surname">Фамилия</label><br>
            <input type="text" id="surname" name="surname">
        </div>
        <div>
            <label for="name">Имя</label><br>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="patronymic">Отчество</label><br>
            <input type="text" id="patronymic" name="patronymic">
        </div>
        <div>
            <label for="login">Логин</label><br>
            <input type="text" id="login" name="login">
        </div>
        <div>
            <label for="email">Адрес электронной почты</label><br>
            <input type="email" id="email" name="email">
            </div>
        <div>
            <label for="phone" >Телефон</label><br>
            <input type="tel" id="phone" name="phone">
        </div>
        <div>
            <label for="password">Пароль</label><br>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <label for="password-repeat">Повторите пароль</label><br>
            <input type="password" id="password-repeat" name="password-repeat">
        </div>
        <input type="submit" value="Зарегистрироваться">
    </form>
</div>
