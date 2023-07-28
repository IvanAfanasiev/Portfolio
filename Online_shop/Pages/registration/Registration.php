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

//If you enter already existing data, you should be logged in

if (isset($_POST['login'])) {
    echo 'login: '.$_POST['login'] .'<br>';
    echo 'password: '.$_POST['password'] .'<br>';
    echo 'mail: '.$_POST['mail'] .'<br>';

    $password = password_hash($_POST["password"], PASSWORD_ARGON2ID);


    $sql = "select * from users
                WHERE login = '$_POST[login]' and password = '$password'";

    $res = $connect->query($sql);


    //if such a user already exists - Login
    if (mysqli_num_rows($res) != 0){
        $error = enter(); //login function
        echo  count($error);
        $UID = $_SESSION['id'];

        $admin = is_admin($UID);
        header('Location: ../../index.php'); //It can be "LogIn.php" also, no difference
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


                        //if database already have such an email
                    if(mysqli_num_rows($res) == 0)
                    {
                        $login = $_POST['login'];
                        $connect->insert_id;
                        $sql = "insert into users (login, password, email, role) values('$login', '$password', '$mail', default)";
                        $res = $connect->query($sql);
                        $connect-> close();

                        header('Location: ../../index.php');
                        $msg= "Registration was successful.";
                    }
                    else
                        $msg= 'This email address is already registered';
                }
                //does not fit the mail template (preg_match)
                else
                {
                    $msg = 'Wrong mail template!';
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
