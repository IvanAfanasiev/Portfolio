<?php
require_once "../../global.php";
//<!--                phone_links_active-->




echo <<< STYLE
<div>
        <style id="themeStyle">@layer pinky, day, night;</style>
</div>
STYLE;
echo <<< HEADER
        <header>
            <div class="header">
                <nav class="phone_links"> 
                    <div class='linkWrapper'>
                        <a onClick="ActivateMenu" href="../catalog/Catalog.php">Catalog</a>
                        <a onClick="ActivateMenu" href="../favorites/Favorites.php">Favorites</a>
HEADER;
if (is_admin($_SESSION['id']))
    echo '<a href="../addNew/AddProduct.php">ADD new products</a>';
echo <<< HEADER
                    <a class="logOut" href="../LogOut.php">Log out</a>
                    </div> 
                    <button class="phoneLinksButtn" onClick="ActivateMenu()">
                        <line></line>
                        <line></line>
                        <line></line>
                    </button>
                </nav>

                <img class="Logo" src="../../images/logo.png">


                <nav class="links">
                    <a href="../catalog/Catalog.php">Catalog</a>
                    <a href="../favorites/Favorites.php">Favorites</a>
 HEADER;
    if (is_admin($_SESSION['id']))
        echo '<a href="../addNew/AddProduct.php">ADD new products</a>';
echo <<< HEADER
                    <a class="logOut" href="../LogOut.php">Log out</a>
                </nav>
                <button onclick="ChangeThemeStyle()" class="Theme">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="circle"></div>
                </button>
                    <div class="searchPanel">
                            <form method="POST" action="">
                                <input  class="search"
                                    placeholder="I looking for..."
                                    name="findBy"
HEADER;
                                    if (isset($_POST['findBy']))
                                        echo 'value="'.$_POST['findBy'].'"';
                                    else
                                        echo 'value=""';
echo <<< HEADER
                                >
                            </form>
                            <button onClick="ClearSearchPanel()" class="close-circle"><ion-icon name="close-circle-outline"></ion-icon></button>
                            <ion-icon name="search-sharp"></ion-icon>
                    </div>
            </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src='../../ButtonsFunc.js'></script>
        </header>
HEADER;
