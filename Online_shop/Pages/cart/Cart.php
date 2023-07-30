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

<?php
require_once "../Header.php";
?>




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

            <div className='cartContainer'>
                <div className="cart_wrapper">
                    <div className="cart_imgContainer">
                        <img className="cart_cardImageBG" <?php echo "src ='data:image/png;base64," . base64_encode($product['image']) . "' "?> />
                        <img className="cart_cardImage" <?php echo "src ='data:image/png;base64," . base64_encode($product['image']) . "' "?> />
                    </div>
                    <div className="cart_cardContainer">
                        <div className="cart_card">
                            <div className="cart_platforms">
                                <ion-icon name="logo-windows"></ion-icon>
                                <ion-icon name="logo-xbox"></ion-icon>
                                <ion-icon name="logo-playstation"></ion-icon>
                            </div>
                            <div className="cart_description">
                                <h1><?php echo $product['name'];?></h1>
                                A brief (or not) description of the game.
                                Perhaps some other information such as average rating, price or number of downloads
                            </div>
                            <div className="Buy">
                                <div className="price">$14.99</div>
                                <button className='BuyButtn'>Buy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </nav>
</div>

<?php
require_once "../Footer.php";
?>



<script src="http://code.jquery.com/jquery-latest.min.js"></script>
</body>
</html>