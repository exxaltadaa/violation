<?php
    $menu = "";
    if(isset($_SESSION['login'])){
        if($_SESSION['role'] == "Администратор"){
            $menu .= '<li>
                        <a href="../admin/">Админ Панель</a>
                    </li>';
        }
        $menu .= '<li>
                <a href="../profile/">Личный кабинет</a>
            </li>
            <li>
                <a href="../admin/controllers/logout.php">Выйти</a>
            </li>';
    }else{
        $menu = '<li>
                <a href="../auth/">Авторизация</a>
            </li>
            <li>
                <a href="../register/">Регистрация</a>
            </li>';
    }
    
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Нарушениям.Нет</title>
    <link rel="stylesheet" href="../assets/style/style.css">
</head>
<body>
    <header>
        <a href="../index.php">Нарушениям.Нет</a>
        <ul>
            <?=$menu?>
        </ul>
    </header>
</body>
</html>


