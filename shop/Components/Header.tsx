"use client"
import { useState } from "react";
import Link from "next/link"
import imgsrc from '@/images/logo.png';

import $ from "jquery";

const CreateHeader = () => {

    const [menuClass, setClass] = useState("phone_links");

    let ActivateMenu = () => {
        if (menuClass == "phone_links"){
            setClass("phone_links phone_links_active");
        }
        else{
            setClass("phone_links");
        } 
    }

    const ClearPanel = () =>{
        SetVar("");
    }

    const [variable, SetVar] = useState("");

    const HandleChange = (e) =>{
      SetVar(e.target.value);
    }




    return (
        <header>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
            <div className="header">
                <nav className={menuClass}>
                    <div className='linkWrapper'>
                        <Link onClick={ActivateMenu} href="/">Home</Link>
                        <Link onClick={ActivateMenu} href="/catalog">Catalog</Link>
                        <Link onClick={ActivateMenu} href="/favorites">Favorites</Link>
                    </div> 
                    <button className="phoneLinksButtn" onClick={ActivateMenu}>
                        <line></line>
                        <line></line>
                        <line></line>
                    </button>
                </nav>

                <img className="Logo" src={imgsrc.src} />


                <nav className="links">
                    <Link href="/">Home</Link>
                    <Link href="/catalog">Catalog</Link>
                    <Link href="/favorites">Favorites</Link>
                </nav>
                
                <div className="searchPanel">
                        <input  className="search"
                                placeholder="I looking for..."
                                value={variable}
                                onChange={(event) => HandleChange(event)}
                                /> 
                        <button onClick={ClearPanel} className="close-circle"><ion-icon name="close-circle-outline"></ion-icon></button>
                        <ion-icon name="search-sharp"></ion-icon>
                </div>
            </div>
            <script src="./Theme.js"></script>
        </header>
    )
}

export {CreateHeader};