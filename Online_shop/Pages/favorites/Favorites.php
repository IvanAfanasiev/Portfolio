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
//    die($_POST['changeFavorites']);
    $sql = "delete from favorites 
            where product_id = '$_POST[changeFavorites]'";

    $res = $connect->query($sql);
}
?>


<br>
<br>
<!-- later this will be used to upload new photos to the database -->

<!--<form method="POST" action="" enctype="multipart/form-data">-->
<!--    <input type="file" name="myimage">-->
<!--    <input type="submit" name="submit_image" value="Upload">-->
<!--</form>-->


<div id="result"></div>
<script>
    $('#ajax-form').submit(function(e) {
        var htmlData = html(data);
        e.preventDefault();
        var method = $('#ajax-form').attr('method');
        var url = $('#ajax-form').attr('url');
        $[method](url, $('#ajax-form').serialize(), function(data) { $('#result').html(data); });
    });
</script>


<div class="mainContent">
    <nav class="goodsList">
        <!-- displaying photos from the database -->
        <?php
        $i = 0;
        $sql = "select * from product p inner join
                favorites f on p.id = f.product_id where f.user_id = '$_SESSION[id]'";

        $res = $connect->query($sql);
        echo "<div class='wrapper'>";
        while($product = $res->fetch_assoc()){
            ?>
            <div class='cardContainer'>
<!--            <a href='' class='card'>-->
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
                        <form id="ajax-form" method="POST" action="">
                            <button class="favourites" type="submit" name="changeFavorites" value="<?php echo $product['id'] ?>">
                                <!-- there will be different icons depending on whether the product is added to favorites -->
                                 <ion-icon name="heart"></ion-icon>
<!--                                <ion-icon name="heart-dislike"></ion-icon>-->
                            </button>
                        </form>
                    </div>
<!--            </a>-->
                </div>
            </div>
            <?php
            if (($i+1) %3 == 0)
            {
                echo "</div><div class='wrapper'>";
            }
            $i+=1;
        }
        echo "</div>";
        ?>
</div>

</nav>
</div>

<form id="ajax-form" action="" method="post">
    <input type="text" name="changeFavorites">
    <input type="submit">
</form>






<?php
require_once "../Footer.php";
?>



<script src="http://code.jquery.com/jquery-latest.min.js"></script>
</body>
</html>
