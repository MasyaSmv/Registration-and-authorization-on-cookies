<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING); //Фильтр логина
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING); //Филтр имени
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING); //Фильтр пароля
    $pass_2 = filter_var(trim($_POST['pass-2']), FILTER_SANITIZE_STRING); //Фильтр повторного пароля
    $mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL); //Фильтр почты

    if(mb_strlen($login) < 5 || mb_strlen($login) > 90) { //Проверка логина
        echo "Длина логина должна быть от 5 симвлов";
        exit();
    } else if(mb_strlen($pass) < 5 || mb_strlen($pass) > 95) { //проверка пароля
        echo "Длина пароля должна быть от 5 символов";
        exit();
    } else if($pass_2 != $pass) { //Проверка идентичности пароля
        echo "Пароли не совпадают";
        exit();
    } else if(mb_strlen($name) < 3 || mb_strlen($name) > 95) { //Проверка имени
        echo "Длина имени должна быть от 3 букв";
        exit();
    } if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) { //Проверка почты
        echo "E-mail адрес '$mail' указан неверно.\n";
        exit();
    }

    $pass = md5($pass. "322"); //Хеширование паролей
    $pass_2 = md5($pass_2. "322");

    $mysql = new mysqli('localhost','root','7895123','register_bd'); //Вход в базу данных
    $mysql->query("INSERT INTO `users` (`login`, `pass`, `pass-2`, `name`, `mail`) VALUES ('$login', '$pass', '$pass_2', '$name', '$mail')"); //присваивание перменных таблице
    $mysql->close(); //Выход из базы данных

    header('Location: http://localhost/MasyaSm/'); //Возвращение на страницу регистрации при удачной регистрации
    exit();
?>
