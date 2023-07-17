"use client"
import { useState } from "react";
import Link from "next/link"


const CreateSideBar = () => {

    const [searchReq, SetReq] = useState("");

    let ClearRequest = () => {
        SetReq("");
    }


    return (
        <div className="Side_Bar">
            <div className="Side_Wrapper">
                <Link href="/catalog" className="Side_component side_catalog"><ion-icon name="game-controller"></ion-icon></Link>
                <Link href="/cart" className="Side_component side_cart"><ion-icon name="cart"></ion-icon></Link>
                <Link href="/favorites" className="Side_component side_favorites"><ion-icon name="bookmark"></ion-icon></Link>
            </div>
        </div>
    )
}

export {CreateSideBar};