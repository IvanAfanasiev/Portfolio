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
    <link href="style.css" rel="stylesheet"/>
    <link href="../globals.css" rel="stylesheet"/>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Document</title>
</head>



<br>
<br>
<!-- later this will be used to upload new photos to the database -->

<!--<form method="POST" action="" enctype="multipart/form-data">-->
<!--    <input type="file" name="myimage">-->
<!--    <input type="submit" name="submit_image" value="Upload">-->
<!--</form>-->


<div class="mainContent">
<nav class="goodsList">

<!-- displaying photos from the database -->
<?php
$i = 0;
$sql = "select * from product";

$res = $connect->query($sql);
echo "<div class='wrapper'>";
while($product = $res->fetch_assoc()){
 ?>
            <div class='cardContainer'>
                <a href='' class='card'>
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
                        <div class="favourites">
                            <!-- there will be different icons depending on whether the product is added to favorites -->
                            <!-- <ion-icon name="heart"></ion-icon> -->
                            <ion-icon name="heart-dislike"></ion-icon>
                        </div>
                    </div>
                </a>
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





<!-- showing photos -->
<?php
//$select_image="select * from product where id=1";
//
//$res= $connect->query($select_image);
//
//if($row=$res->fetch_array())
//    $image_content=$row['image'];
//
//echo"<img class='' src ='data:image/png;base64," . base64_encode($image_content) . "'>";
//?>

<!--uploading a photo-->
<?php
//if (empty($_FILES['myimage']['tmp_name'])) return;
//$newImg=addslashes(file_get_contents($_FILES['myimage']['tmp_name']));
//$newName = $_FILES["myimage"]["name"];
////$sql = "UPDATE product
////            SET image = '$newImg',
////            name = '$newName'
////            WHERE id= 1";
//
//$sql = "insert into product
//                    (name, description, image, price, discount, platform_pc, platform_xbox, platform_ps)
//            values ('new name', 'new description', '$newImg', 101, 11, true, true, false);";
//
//
//    $conn = new mysqli("localhost", "root", "", "shop");
//    $res = $conn->query($sql);
?>


<?php
require_once "../Footer.php";
?>
</body>
</html>
