<?php
require_once "global.php";
if (login()) //login определяет, авторизирован пользователь или нет
{
    $UID = $_SESSION['id']; //если пользователь авторизирован, присваиваем переменной $UID его id
    $admin = is_admin($UID); //определяем, админ ли пользователь
    header('Location: Pages/catalog/Catalog.php');
}
//id='. $UID
else
    header('Location: Pages/login/Login.php');
?>