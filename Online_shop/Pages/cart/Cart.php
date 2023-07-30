<?php
require_once "../../global.php";
require "../../connect.php";

if (!login())
    header('Location: ../../index.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../../images/favico.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../catalog/style.css" rel="stylesheet"/>
    <link href="style.css" rel="stylesheet"/>
    <link href="../globals.css" rel="stylesheet"/>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Document</title>
</head>




<!-- Add To favorites -->
<?php
//if ( isset($_POST['changeFavorites']) ) {
////    die($_POST['changeFavorites']);
//    $sql = "delete from favorites
//            where product_id = '$_POST[changeFavorites]'";
//
//    $res = $connect->query($sql);
//}
//?>


<?php
    $sql = "select * from product where name = '$_GET[game]'";
    $res = $connect->query($sql);
    $product = $res->fetch_assoc();
?>
<div class="mainContent">
    <nav class="goodsList">
        <div class='wrapper'>

            <div class='cardContainer'>
                <div class='card'>
                    <div class='imgContainer'>
                        <img class="cardImageBG" <?php echo "src ='data:image/png;base64," . base64_encode($product['image']) . "' "?> >
                        <img class="cardImage" src ='<?php echo "data:image/png;base64," . base64_encode($product['image'])?>' >
                    </div>
                    <div class="description">
                        <div class="platforms">
                            <ion-icon name="logo-windows"></ion-icon>
                            <ion-icon name="logo-xbox"></ion-icon>
                            <ion-icon name="logo-playstation"></ion-icon>
                        </div>
                        <?php echo $product['name']?>
                    </div>
                </div>
            </div>

        </div>
    </nav>
</div>



</body>
</html>