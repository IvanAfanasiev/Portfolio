<?php
require_once "../../global.php";
require "../../connect.php";

if (!login()) //login определяет, авторизирован пользователь или нет
    header('Location: ../../index.php');
?>