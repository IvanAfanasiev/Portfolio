<?php
if (empty($_POST['Name'])) echo "<script> history.back();  </script>";;
if (empty($_POST['Description'])) echo "<script> history.back();  </script>";;
if (empty($_POST['Price'])) echo "<script> history.back();  </script>";;
if (empty($_POST['Discount'])) echo "<script> history.back();  </script>";;

$newName = $_POST['Name'];
$newDescription =  $_POST['Description'];
$newPrice = $_POST['Price'];
$newDiscount = $_POST['Discount'];
$isPC = isset($_POST['PC']);
$isPS = isset($_POST['PS']);
$isXBOX = isset($_POST['XBOX']);

if (empty($_FILES['myimage']['tmp_name'])){
    $sql = "UPDATE product
            SET
            name = '$newName',
            description = '$newDescription',
            price = '$newPrice',
            discount = '$newDiscount',
            platform_pc = '$isPC',
            platform_ps = '$isPS',
            platform_xbox = '$isXBOX'
            WHERE id='$_GET[prdctid]'";
}
else{
    $newImg=addslashes(file_get_contents($_FILES['myimage']['tmp_name']));

    $sql = "UPDATE product
            SET
            name = '$newName',
            description = '$newDescription',
            image = '$newImg',
            price = '$newPrice',
            discount = '$newDiscount',
            platform_pc = '$isPC',
            platform_ps = '$isPS',
            platform_xbox = '$isXBOX'
            WHERE id='$_GET[prdctid]'";
}



$conn = new mysqli("localhost", "root", "", "shop");
$res = $conn->query($sql);

echo "<script> history.back();  </script>";