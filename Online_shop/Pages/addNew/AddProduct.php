<?php
require_once "../../global.php";
require "../../connect.php";

if (!login() || !is_admin($_SESSION['id']))
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
<body>



<div class="newProduct">

    <form method="POST" action="" enctype="multipart/form-data" class="Form">
        <div class="imgInput">
            <div class="icon"><ion-icon name="cloud-upload-outline"></ion-icon></div>
            <p id="filename">Click or drag file to upload image</p>
            <input type="file" name="myimage" oninput="ShowImg()" id="ImgInpt">
        </div>
        <div class="Inputs">
            <div class="lineInput">
                <input type="text" name="Name" class="inpt" placeholder="Name">
                <label>Name</label>
            </div>
            <div class="lineInput">
                <input type="text" name="Description" class="inpt" placeholder="Description">
                <label>Description</label>
            </div>
            <div class="lineInput">
                <input type="number" name="Price" class="inpt" placeholder="Price">
                <label>Price</label>
            </div>
            <div class="lineInput">
                <input type="number" name="Discount" class="inpt" placeholder="Discount (as a percentage)">
                <label>Discount (as a percentage)</label>
            </div>
            <div class="lineInput">
                <input name="PC" type="checkbox" class="hidden-inpt">
                <ion-icon name="desktop-outline"></ion-icon>
            </div>
            <div class="lineInput">
                <input name="PS" type="checkbox" class="hidden-inpt">
                <ion-icon name="logo-playstation"></ion-icon>
            </div>
            <div class="lineInput">
                <input name="XBOX" type="checkbox" class="hidden-inpt">
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


<?php
    if (empty($_FILES['myimage']['tmp_name'])) return;
    if (empty($_POST['Name'])) return;
    if (empty($_POST['Description'])) return;
    if (empty($_POST['Price'])) return;
    if (empty($_POST['Discount'])) return;
    $newImg=addslashes(file_get_contents($_FILES['myimage']['tmp_name']));
    $isPC = isset($_POST['PC']);
    $isPS = isset($_POST['PS']);
    $isXBOX = isset($_POST['XBOX']);


        $newName = $_POST['Name'];
        $newDescription =  $_POST['Description'];
        $newPrice = $_POST['Price'];
        $sql = "insert into product
                        (name, description, image, price, discount, platform_pc, platform_xbox, platform_ps)
                values('$_POST[Name]', 
                       '$_POST[Description]', 
                       '$newImg', 
                       '$_POST[Price]', 
                       '$_POST[Discount]', 
                       '$isPC', 
                       '$isPS', 
                       '$isXBOX');";
        $conn = new mysqli("localhost", "root", "", "shop");
        $res = $conn->query($sql);
//

?>

</body>
</html>