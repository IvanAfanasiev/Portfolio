"use client"
import { useState } from "react";
import Link from "next/link"


const CreateFooter = () => {

    const [searchReq, SetReq] = useState("");

    let ClearRequest = () => {
        SetReq("");
    }


    return (
        <footer>
            <div className="footer">
                Info or something else (contact details, social networks, advertising)
            </div>
            <script src="./Theme.js"></script>
        </footer>
    )
}

export {CreateFooter};