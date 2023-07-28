<?php
session_start();

    function enter ()
    {
        $connect = new mysqli("localhost", "root", "", "shop");
        $error = array(); //массив для ошибок
        if (!empty($_POST['login']) && !empty($_POST['password'])) //если поля заполнены
        {
            $login = $_POST['login'];
//            $password = password_hash($_POST["password"], PASSWORD_ARGON2ID);
            $rez = $connect->query("SELECT * FROM users WHERE login= '$login'"); //запрашивается строка из базы данных с логином, введённым пользователем
            if (mysqli_num_rows($rez) != 0) //если нашлась одна строка, значит такой юзер существует в базе данных
            {
//                echo "<br>";
//                echo $row['password'];
//                echo "<br>";
//                echo password_hash($_POST["password"], PASSWORD_ARGON2ID);
//                echo'<br>tu<br>';
                $row = $rez->fetch_assoc();
                if(password_verify($_POST["password"], $row["password"]))
                {
                    echo $login;
                    //пишутся логин и хэшированный пароль в cookie, также создаётся переменная сессии
                    setcookie ("login", $row['login'], time() + 5000, '/');
                    setcookie ("password", md5($row['login'].$row['password']), time() + 5000, '/');
                    $_SESSION['id'] = $row['id'];   //записываем в сессию id пользователя
                }
                else //если пароли не совпали
                {
                    $error[] = "Wrong password";
                }
            }
            else //если такого пользователя не найдено в базе данных
            {
                $error[] = "Wrong login or password";
            }
        }
        else
            $error[] = "There is empty field!";
        return $error;
    }


    function login () {
//        $connect = new mysqli("localhost", "root", "", "shop");

        if (isset($_SESSION['id']))//если сесcия есть
        {
            if(isset($_COOKIE['login']) != '' && isset($_COOKIE['password'])!= '') //если cookie есть, обновляется время их жизни и возвращается true
            {
                setcookie ("login", $_COOKIE['login'], time() + 5000, '/');
                setcookie ("password", $_COOKIE['password'], time() + 5000, '/');

                $id = $_SESSION['id'];
                return true;

            }
            else //иначе добавляются cookie с логином и паролем, чтобы после перезапуска браузера сессия не слетала
            {
                $rez = $connect->query("SELECT * FROM users WHERE id='{$_SESSION['id']}'"); //запрашивается строка с искомым id

                if (mysqli_num_rows($rez) == 1) //если получена одна строка
                {
                    $row = $rez->fetch_assoc(); //она записывается в ассоциативный массив

                    setcookie ("login", $row['login'], time()+5000, '/');

                    setcookie ("password", $_COOKIE['password'], time() + 5000, '/');

                    $id = $_SESSION['id'];
                    return true;

                }
                else return false;
            }
        }
        else //если сессии нет, проверяется существование cookie
        {
            if(isset($_COOKIE['login']) && isset($_COOKIE['password'])) //если куки существуют, проверяется их валидность по базе данных
            {
                $rez = $connect->query("SELECT * FROM users WHERE login='{$_COOKIE['login']}'"); //запрашивается строка с искомым логином и паролем
                @$row = $rez->fetch_assoc();

                if(@mysqli_num_rows($rez) == 1 && $row['password'] == $_COOKIE['password']) //если логин и пароль нашлись в базе данных
                {
                    $_SESSION['id'] = $row['id']; //записываем в сесиию id
                    $id = $_SESSION['id'];
                    return true;
                }
                else //если данные из cookie не подошли, эти куки удаляются
                {
                    SetCookie("login", "", time() - 360000, '/');
                    SetCookie("password", "", time() - 360000, '/');
                    return false;

                }
            }
            else //если куки не существуют
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
        unset($_SESSION['id']); //удалятся переменная сессии

        SetCookie("login", "", time() - 360000, '/');
        SetCookie("password", "", time() - 360000, '/');


        header('Location: index.php'); //перенаправление на главную страницу сайта
    }


?>