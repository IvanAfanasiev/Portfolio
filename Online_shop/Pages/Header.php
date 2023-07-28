<?php
echo <<< HEADER
<header>
            <div class="header">
                <nav class="phone_links"> 
<!--                phone_links_active-->
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
                    <a href="">Catalog</a>
                    <a href="">Favorites</a>
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