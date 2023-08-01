<?php
require_once "../../global.php";
require "../../connect.php";

if (!login())
    header('Location: ../../index.php');
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




<!-- Add To favorites -->
<?php
if ( isset($_POST['deleteFavorites']) ) {
    $sql = "delete from favorites
            where product_id = '$_POST[deleteFavorites]'";
    $res = $connect->query($sql);
}
elseif ( isset($_POST['addFavorites']) ) {
    $sql = "insert into favorites 
                    (id, user_id, product_id)
            VALUES (NULL, '$_SESSION[id]', '$_POST[addFavorites]')";
    $res = $connect->query($sql);
}
//?>


<?php
    $sql = "select * from product where name = '$_GET[game]'";
    $res = $connect->query($sql);
    $product = $res->fetch_assoc();
    $newPrice = 0;
    if($product['discount']!=0){
        $newPrice = $product['price'] - ($product['price']/100*$product['discount']);
//        $newPrice = round($newPrice, 2);
        $newPrice = number_format((float)round( $newPrice ,2),2,'.',',');
    }
?>
<div class='Container'>
    <div class="name"><?php echo"$product[name]"?>!!!</div>
    <div class="wrapper">
        <div class="imgContainer">
            <img class="cardImageBG" src ='<?php echo "data:image/png;base64," . base64_encode($product['image'])?>'>
            <img class="cardImage" src='<?php echo "data:image/png;base64," . base64_encode($product['image'])?>'>
        </div>
        <div class="cardContainer">
            <div class="card">
                <div class="description">
                    A brief (or not) description of the game.
                    Perhaps some other information such as average rating, price or number of downloads
                    asds
                </div>
                <div class="btnns">
                    <div class="Buy">
                        <?php
                            if($product['discount']!=0){
                            echo '<div class="discount">-'.$product['discount'].'%</div>';
                            echo '<div class="price">$'.$newPrice.'</div>';
                            echo '<div class="newPrice">$'.$product['price'].'</div>';
                            }
                            else
                                echo '<div class="price">$'.$product['price'].'</div>';
                        ?>
                        <button class="BuyButtn">Buy</button>
                    </div>
                    <div class="platforms">
                        <?php if($product['platform_pc']) echo "<ion-icon name='logo-windows'></ion-icon>"?>
                        <?php if($product['platform_xbox']) echo "<ion-icon name='logo-xbox'></ion-icon>"?>
                        <?php if($product['platform_ps']) echo "<ion-icon name='logo-playstation'></ion-icon>"?>
                    </div>
                    <form action="" method="post">
                        <?php $sql = "select * from favorites 
                                        where product_id = '$product[id]' and user_id = '$_SESSION[id]'";
                            $res = $connect->query($sql);
                            if($fav = $res->fetch_assoc())
                                echo <<< BUTTON
                                        <button id="favButtn" class="favouritesActive" type="submit" name="deleteFavorites" value="$product[id]">
                                            <ion-icon name="heart"></ion-icon>
                                        </button>
                                     BUTTON;
                            else
                                echo <<< BUTTON
                                        <button id="favButtn" class="favourites" type="submit" name="addFavorites" value="$product[id]">
                                             <ion-icon name="heart-dislike"></ion-icon>
                                        </button>
                                     BUTTON;
                        ?>


                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>