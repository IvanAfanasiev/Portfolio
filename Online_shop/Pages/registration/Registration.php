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

//echo 'Если ввести уже существующие данные, тебя просто залогинит';

if (isset($_POST['login'])) {
    echo 'login: '.$_POST['login'] .'<br>';
    echo 'password: '.$_POST['password'] .'<br>';
    echo 'mail: '.$_POST['mail'] .'<br>';

    $password = password_hash($_POST["password"], PASSWORD_ARGON2ID);


    $sql = "select * from users
                WHERE login = '$_POST[login]' and password = '$password'";

    $res = $connect->query($sql);


    //если такой пользователь уже есть - Логин
    if (mysqli_num_rows($res) != 0){
        $error = enter(); //функция входа на сайт
        echo  count($error);
        $UID = $_SESSION['id'];

        $admin = is_admin($UID);
        header('Location: ../../index.php'); //можно и LogIn.php   , без разницы
    }
    else{
        $msg = '';
        if(!empty($_POST['login']) && !empty($_POST['password']))
        {
            if (!empty($_POST['mail'])){
                $mail= ($_POST['mail']);
                $regex = '/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/';
                if(preg_match($regex, $mail))
                {
                    $sql = "select * from users
                    WHERE email = '$mail'";
                        $res = $connect->query($sql);


                        //если уже есть такой меил
                    if(mysqli_num_rows($res) == 0)
                    {
                        $login = $_POST['login'];
                        $connect->insert_id;
                        $sql = "insert into users (login, password, email, role) values('$login', '$password', '$mail', default)";
                        $res = $connect->query($sql);
//                        $sql = "insert into user (name, surname, role, id) values('$name', '$surname', default, LAST_INSERT_ID())";
//                        $res = $connect->query($sql);
                        $connect-> close();

                        header('Location: ../../index.php');
                        $msg= "Registration was successful.";
                    }
                    else
                        $msg= 'This email address is already registered';
                }
                //не подходит под шаблон почты
                else
                {
                    $msg = 'Wrong e-mail!';
                }
            }


        }
        echo $msg;
    }
}


?>
<form name="form" action="" method="post">
    <input type="text" size="16" placeholder="Login" class="log" name="login">
    <input type="text" size="16" placeholder="Password" class="pass" name="password">
    <input type="text" size="16" placeholder="E-Mail" class="mail" name="mail">
    <input type="submit" value="Registration">
</form>


</body>
</html>
