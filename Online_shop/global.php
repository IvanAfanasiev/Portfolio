<?php
session_start();
    function enter ()
    {
        $connect = new mysqli("localhost", "root", "", "shop");
        $error = array(); //array for errors
        if (!empty($_POST['login']) && !empty($_POST['password'])) //if the fields are filled
        {
            $login = $_POST['login'];
            $rez = $connect->query("SELECT * FROM users WHERE login= '$login'"); //a string is requested from the database with the username entered by the user
            if (mysqli_num_rows($rez) != 0) //if there is one line, it means that such a user exists in the database
            {
                $row = $rez->fetch_assoc();
                if(password_verify($_POST["password"], $row["password"]))
                {
                    echo $login;
                    //the login and hashed password are written in the cookie, and a session variable is also created
                    setcookie ("login", $row['login'], time() + 5000, '/');
                    setcookie ("password", md5($row['login'].$row['password']), time() + 5000, '/');
                    $_SESSION['id'] = $row['id'];   //записываем в сессию id пользователя
                }
                else //if the passwords don't match
                {
                    $error[] = "Wrong password";
                }
            }
            else //if no such user is found in the database
            {
                $error[] = "Wrong login or password";
            }
        }
        else
            $error[] = "There is empty field!";
        return $error;
    }


    function login () {
        if (isset($_SESSION['id']))//if there is a session
        {
            if(!empty(isset($_COOKIE['login'])) && !empty(isset($_COOKIE['password']))) //if there are cookies, their lifetime is updated and true is returned
            {
                setcookie ("login", $_COOKIE['login'], time() + 5000, '/');
                setcookie ("password", $_COOKIE['password'], time() + 5000, '/');

                $id = $_SESSION['id'];
                return true;

            }
            else //otherwise, cookies with login and password are added so that the session does not crash after restarting the browser
            {
                $connect = new mysqli("localhost", "root", "", "shop");
                $rez = $connect->query("SELECT * FROM users WHERE id='{$_SESSION['id']}'"); //a string with the required id is requested

                if (mysqli_num_rows($rez) == 1) //if one line is received
                {
                    $row = $rez->fetch_assoc(); //it is written to an array

                    setcookie ("login", $row['login'], time()+5000, '/');

                    setcookie ("password", $row['password'], time() + 5000, '/');

                    $id = $_SESSION['id'];
                    return true;

                }
                else return false;
            }
        }
        else //if there is no session, the cookie existence is checked
        {
            if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) //if cookies exist, their validity is checked against the database
            {
                $connect = new mysqli("localhost", "root", "", "shop");
                $rez = $connect->query("SELECT * FROM users WHERE login='{$_COOKIE['login']}'"); //a string with the desired username and password is requested
                @$row = $rez->fetch_assoc();

                if(@mysqli_num_rows($rez) == 1 && $row['password'] == $_COOKIE['password']) //if the username and password were found in the database
                {
                    $_SESSION['id'] = $row['id']; //record the id in the session
                    $id = $_SESSION['id'];
                    return true;
                }
                else //if the data from the cookie does not fit, these cookies are deleted
                {
                    SetCookie("login", "", time() - 5000, '/');
                    SetCookie("password", "", time() - 5000, '/');
                    return false;

                }
            }
            else //if cookies do not exist
                return false;
        }
    }

    function is_admin($id) {
        $connect = new mysqli("localhost", "root", "", "shop");

        $res = $connect->query("SELECT role FROM users WHERE id='$id'");
        $user = $res->fetch_assoc();

        return ($user['role'] == "admin");
    }

    function out () {
        session_start();
        unset($_SESSION['id']); //session variable is deleted

        SetCookie("login", "", time() - 5000, '/');
        SetCookie("password", "", time() - 5000, '/');


        header('Location: index.php'); //redirection to the main page of the site
    }


?>