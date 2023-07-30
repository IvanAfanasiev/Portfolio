<?php
require_once "../../global.php";
//<!--                phone_links_active-->

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
                    <a href="">Home</a>
                    <a href="../catalog/Catalog.php">Catalog</a>
                    <a href="../favorites/Favorites.php">Favorites</a>
 HEADER;
    if (is_admin($_SESSION['id']))
        echo '<a href="../CRUD/ProductCrud.php">Change products</a>';
echo <<< HEADER
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
        </header>

 HEADER;
