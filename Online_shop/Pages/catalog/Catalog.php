<?php
require_once "../../global.php";
require "../../connect.php";


//if (!login()) //login determines whether the user is authorized or not
//    header('Location: ../../index.php');

require_once "../Header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../../images/favico.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet"/>
    <link href="../globals.css" rel="stylesheet"/>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Document</title>
</head>



<br>
<br>



<div class="mainContent">
<nav class="goodsList">

<!-- displaying goods from the database -->
<?php

if (!isset($_POST['findBy'])) {
    $sql = "select * from product";
}
else{
    $sql = "select * from product where name like '%$_POST[findBy]%'";
}


$res = $connect->query($sql);
echo "<div class='wrapper'>";
while($product = $res->fetch_assoc()){
 ?>
            <div class='cardContainer'>
                <a href='../cart/Cart.php?game=<?php echo $product['id'];?>' class='card'>
                    <div class='imgContainer'>
                        <img class="cardImageBG" <?php echo "src ='data:image/png;base64," . base64_encode($product['image']) . "' "?> >
                        <img class="cardImage" src ='<?php echo "data:image/png;base64," . base64_encode($product['image'])?>' >
                    </div>
                    <div class="description">
                        <div class="platforms">
                            <?php
                                if($product['platform_pc'])
                                    echo '<ion-icon name="logo-windows"></ion-icon>';
                                if($product['platform_ps'])
                                    echo '<ion-icon name="logo-playstation"></ion-icon>';
                                if($product['platform_xbox'])
                                    echo '<ion-icon name="logo-xbox"></ion-icon>';
                            ?>
                        </div>
                        <?php echo $product['name']?>
                    </div>
                    <div class="arrow"><ion-icon name="arrow-down-outline"></ion-icon></div>
                </a>
            </div>
<?php
}
echo "</div>";
?>
    </div>

</nav>
</div>



<?php
require_once "../Footer.php";
?>



</body>
</html>
