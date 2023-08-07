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


if (login()) //determines whether the user is authorized or not
{
    $UID = $_SESSION['id']; //if the user is authorized, we assign his id to the $UID variable
    $admin = is_admin($UID); //we determine whether the user is an admin
    header('Location: ../catalog/Catalog.php');
}

echo 'not authorized';

if(!empty($_POST['login']) && !empty($_POST['password']))
{
    $error = enter(); //website login function
    var_dump($error);
    if (count($error) == 0) //if there are no errors, we authorize the user
    {
        $UID = $_SESSION['id'];

        $admin = is_admin($UID);
        header('Location: ../catalog/Catalog.php'); //It can be "LogIn.php" also, no difference
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