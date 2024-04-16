<?php
session_start();
include "../inc/header.php";
?>

<div class="h_2">
    <p class="p_1">Подача заявления</p>  
    <form action="../admin/controllers/add_application.php" method="post">
        <div>
            <label for="number">Государственный регистрационный номер автомобиля</label><br>
            <input type="text" id="number" name="number">
        </div>
        <div>
            <label for="message">Описание нарушения</label><br>
            <textarea id="message" name="message" rows="5"></textarea>
        </div>
        <input type="submit" value="Подать заявление">
    </form>
</div>
