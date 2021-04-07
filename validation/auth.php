<?php

    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING); //Фильтр логина
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING); //Фильтр пароля

    $pass = md5($pass."322");

    $mysql = new mysqli('localhost','root','7895123','register_bd'); //Вход в базу данных

    $result = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'"); //Присваивает переменные стобцам БД
    $user = $result->fetch_assoc(); //Создает ассоциативный ряд

    /*if(count($user) === 0) {              Не работает проверка отсутствия пользователя
        echo "Такой пользователь не найден";
        exit();
    }*/

    setcookie('user', $user['name'], time() + 3600, "/");

    $mysql->close(); //Выход из базы данных

    header('Location: http://localhost/MasyaSm/'); //Возвращение на страницу регистрации при удачной регистрации
    exit();

?>
