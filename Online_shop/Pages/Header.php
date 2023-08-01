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
                        <a onClick="ActivateMenu" href="/">Home</a>
                        <a onClick="ActivateMenu" href="">Catalog</a>
                        <a onClick="ActivateMenu" href="">Favorites</a>
                    </div> 
                    <button class="phoneLinksButtn" onClick="ActivateMenu">
                        <line></line>
                        <line></line>
                        <line></line>
                    </button>
                </nav>

                <img class="Logo" src="../../images/logo.png">


                <nav class="links">
                    <a href="../catalog/Catalog.php">Home</a>
                    <a href="../catalog/Catalog.php">Catalog</a>
                    <a href="../favorites/Favorites.php">Favorites</a>
 HEADER;
    if (is_admin($_SESSION['id']))
        echo '<a href="../CRUD/ProductCrud.php">Change products</a>';
echo <<< HEADER
                    <a class="logOut" href="../LogOut.php">Log out</a>
                <button onclick="ChangeThemeStyle()" class="Theme">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="circle"></div>
                </button>
                </nav>
                <div class="searchPanel">
                        <input  class="search"
                                placeholder="I looking for..."
                                value=""
                                onChange=""> 
                        <button onClick="ClearPanel" class="close-circle"><ion-icon name="close-circle-outline"></ion-icon></button>
                        <ion-icon name="search-sharp"></ion-icon>
                </div>
            </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src='../../ButtonsFunc.js'></script>
        </header>
 HEADER;
