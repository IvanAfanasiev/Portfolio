<?php
require_once "../../global.php";
//<!--                phone_links_active-->

//if (!login()) //login determines whether the user is authorized or not
//    header('Location: ../../index.php');


//<a onClick="ActivateMenu" href="../catalog/Catalog.php">Catalog</a>
//<a href="../catalog/Catalog.php"><ion-icon name="home"></ion-icon></a>

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
                        <a onClick='ActivateMenu' href='../favorites/Favorites.php'>Favorites</a>
HEADER;

if (login() && is_admin($_SESSION['id']))
    echo '<a href="../addNew/AddProduct.php">ADD new products</a>';
if (login())
    echo '<a class="logOut" href="../LogOut.php">Log out</a>';
else
    echo '<a class="logIn" href="../login/Login.php">Log in</a>';

echo <<< HEADER
                  </div> 
                    <button class="phoneLinksButtn" onClick="ActivateMenu()">
                        <line></line>
                        <line></line>
                        <line></line>
                    </button>
                </nav>
                 <a href="../catalog/Catalog.php"><img class="Logo" src="../../images/logo.png"></a>
                

                <nav class="links">
                    <a href="../favorites/Favorites.php" title="Favorites"><ion-icon name="heart-circle"></ion-icon></a>
 HEADER;

    if (login() && is_admin($_SESSION['id']))
        echo '<a href="../addNew/AddProduct.php" title="Add new product"><ion-icon name="bag-add"></ion-icon></a>';
    if (login())
        echo '<a class="logOut" href="../LogOut.php" title="Logout"><ion-icon name="log-out-outline"></ion-icon></a>';
    else
        echo '<a class="logIn" href="../login/Login.php" title="Login"><ion-icon name="log-in-outline"></ion-icon></a>';

echo <<< HEADER
                </nav>
                <button onclick="ChangeThemeStyle()" class="Theme" title="Change theme">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="circle"></div>
                </button>
                    <div class="searchPanel">
                            <form method="POST" action="" id="SearchForm">
                                <input  class="search"
                                    id="inputSearch"
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
        <script src='../../ThemeFunc.js'></script>
        <script src='../../ButtonsFunc.js'></script>
        </header>
    <script>
         currLayer = localStorage.getItem("themeLayer");
         SetTheme();
    </script>
HEADER;
