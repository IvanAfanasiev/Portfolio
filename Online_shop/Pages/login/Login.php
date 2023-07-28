<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
require_once "../../global.php";
require "../../connect.php";


if (login()) //login определяет, авторизирован пользователь или нет
{
    echo 'sss';
    $UID = $_SESSION['id']; //если пользователь авторизирован, присваиваем переменной $UID его id
    $admin = is_admin($UID); //определяем, админ ли пользователь
    header('Location: ../catalog/Catalog.php');
}

echo 'не авторизирован';

if(!empty($_POST['login']) && !empty($_POST['password']))
{
    $error = enter(); //функция входа на сайт
    var_dump($error);
    if (count($error) == 0) //если ошибки отсутствуют, авторизируем пользователя
    {
        $UID = $_SESSION['id'];

        $admin = is_admin($UID);
        header('Location: ../catalog/Catalog.php'); //можно и LogIn.php   , без разницы
    }
}

?>
<form name="form" action="" method="post">
    <input type="text" size="16" placeholder="Login" class="log" name="login">
    <input type="text" size="16" placeholder="Password" class="pass" name="password">
    <input type="submit" value="Log in">
</form>
<a href="../registration/Registration.php">Registration</a>
<br>

</body>
</html>