<?php
require_once "../../global.php";
require "../../connect.php";


if (!login()) //login determines whether the user is authorized or not
    header('Location: ../../index.php');
require_once "../Header.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="../../images/favico.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../catalog/style.css" rel="stylesheet"/>
    <link href="../globals.css" rel="stylesheet"/>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Document</title>
</head>
<?php
if ( isset($_POST['changeFavorites']) ) {
    $sql = "delete from favorites 
            where id = '$_POST[changeFavorites]'";

    $res = $connect->query($sql);
}
?>


<br>
<br>

<div id="result"></div>



<div class="mainContent">
    <nav class="goodsList">
        <!-- displaying photos from the database -->
        <?php
        if (!isset($_POST['findBy']))
            $sql = "select * from product p inner join
                favorites f on p.id = f.product_id where f.user_id = '$_SESSION[id]'";
        else
            $sql = "select * from product p inner join
                favorites f on p.id = f.product_id where f.user_id = '$_SESSION[id]' and name like '%$_POST[findBy]%'";



        $res = $connect->query($sql);
        echo "<div class='wrapper'>";
        while($product = $res->fetch_assoc()){
            ?>
            <div class='cardContainer'>
            <a href='../cart/Cart.php?game=<?php echo $product['product_id'];?>' class='card'>
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
                        <form method="POST" action="">
                            <button class="favourites" type="submit" name="changeFavorites" value="<?php echo $product['id'] ?>">
                                <ion-icon name="heart"></ion-icon>
                            </button>
                        </form>
                    </div>
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
