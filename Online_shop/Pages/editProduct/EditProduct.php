<?php
require_once "../../global.php";
require "../../connect.php";

if (!login() || !is_admin($_SESSION['id']))
    header('Location: ../../index.php');
require_once "../Header.php";
?>
<!doctype html>
<html lang="en">
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
<body>
<?php
$select_image="select * from product where id='$_GET[prdctid]'";
$res= $connect->query($select_image);
if(!$product=$res->fetch_array()){
    echo "    
    <div class='WrongProduct'>
        <p>There is no such product</p>
    </div>
    ";
    return;
}
?>

    <div class="newProduct">
    <form method="POST" action="ChangeOne.php?prdctid=<?php echo $_GET['prdctid']?>" enctype="multipart/form-data" class="Form">
        <div class="imgInput">
            <img class='prdctImg' src ='
            <?php
                echo"data:image/png;base64," . base64_encode($product['image']);
            ?>
            '>
            <div class="icon"><ion-icon name="cloud-upload-outline"></ion-icon></div>
            <p id="filename">Click or drag file to upload image</p>
            <input type="file" name="myimage" oninput="ShowImg()" id="ImgInpt">
        </div>

        <div class="Inputs">
            <div class="lineInput">
                <input type="text" name="Name" class="inpt" placeholder="Name" value="<?php echo $product['name'] ?>">
                <label>Name</label>
            </div>
            <div class="lineInput">
                <input type="text" name="Description" class="inpt" placeholder="Description" value="<?php echo $product['description'] ?>">
                <label>Description</label>
            </div>
            <div class="lineInput">
                <input type="text" name="Price" class="inpt" placeholder="Price" value="<?php echo $product['price'] ?>">
                <label>Price</label>
            </div>
            <div class="lineInput">
                <input type="text" name="Discount" class="inpt" placeholder="Discount" value="<?php echo $product['discount'] ?>">
                <label>Discount (%)</label>
            </div>
            <div class="lineInput">
                <input name="PC" type="checkbox" class="hidden-inpt"
                    <?php
                        if ($product['platform_pc'])
                            echo "checked";
                    ?>
                >
                <ion-icon name="desktop-outline"></ion-icon>
            </div>
            <div class="lineInput">
                <input name="PS" type="checkbox" class="hidden-inpt"
                    <?php
                        if ($product['platform_ps'])
                            echo "checked";
                        ?>
                >
                <ion-icon name="logo-playstation"></ion-icon>
            </div>
            <div class="lineInput">
                <input name="XBOX" type="checkbox" class="hidden-inpt"
                    <?php
                        if ($product['platform_xbox'])
                            echo "checked";
                    ?>
                >
                <ion-icon name="logo-xbox"></ion-icon>
            </div>
        </div>
        <div class="UploadBtn">
            <input type="submit" name="submit_image" value="Upload">
        </div>
    </form>


    </div>



<?php
require_once "../Footer.php";
?>

</body>