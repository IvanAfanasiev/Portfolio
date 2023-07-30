<?php
if (isset($_POST['ChangeFavorites']) ) {
    echo 'was';
//    header("Location: Pages/");
    echo "<script>history.back();</script>";
    exit();
}
