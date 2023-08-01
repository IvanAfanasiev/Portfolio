<?php
session_start();
unset($_SESSION['id']); //session variable is deleted

SetCookie("login", "", time() - 5000, '/');
SetCookie("password", "", time() - 5000, '/');


header('Location: ../index.php'); //redirection to the main page of the site