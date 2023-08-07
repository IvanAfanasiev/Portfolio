<?php
require_once "global.php";
if (login()) //login determines whether the user is authorized or not
{
    $UID = $_SESSION['id']; //if the user is authorized, we assign a variable $UID his id
    $admin = is_admin($UID); //we determine whether the user is an admin
    header('Location: Pages/catalog/Catalog.php');
}
else
    header('Location: Pages/login/Login.php');
?>