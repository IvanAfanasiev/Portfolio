<?php


function FindProduct(){
    $connect = new mysqli("localhost", "root", "", "shop");
    $i = 0;
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
        if (($i+1) %3 == 0)
        {
            echo "</div><div class='wrapper'>";
        }
    $i+=1;
    }
    echo "</div>";
}


