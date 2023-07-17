"use client"
// import { useState } from "react";
import imgsrc1 from '@/images/Mario_series_alternate.svg';
import imgsrc from '@/images/favico.png';
import './style.css'


export default function Content() {
  const cards = []; //3 cards
  const cards2 = []; // 2 cards
  let num = 3;


  // generating content for wrappers. Data can also come from database tables.
  for (let i = 0; i < num; i++){
    cards.push(
      <div className="cardContainer">
        <a href='./cart' className="card">
          <div className="imgContainer">
            <img className="cardImageBG" src={imgsrc.src} />
            <img className="cardImage" src={imgsrc.src} />
          </div>
          <div className="description">
            <div className="platforms">
              <ion-icon name="logo-windows"></ion-icon>
              <ion-icon name="logo-xbox"></ion-icon>
              <ion-icon name="logo-playstation"></ion-icon>
            </div>
            name of the game
            <button onClick={''} className="favourites">
              <ion-icon name="heart"></ion-icon>
              {/* <!-- or  --> */}
              {/* <ion-icon name="heart-dislike"></ion-icon> */}
            </button>
          </div>
        </a>
      </div>
    );  
  }
  for (let i = 0; i < 2; i++){
    cards2.push(
      <div className="cardContainer">
      <a href='./cart' className="card">
        <div className="imgContainer">
          <img className="cardImageBG" src={imgsrc.src} />
          <img className="cardImage" src={imgsrc.src} />
        </div>
        <div className="description">
          <div className="platforms">
            <ion-icon name="logo-windows"></ion-icon>
            <ion-icon name="logo-xbox"></ion-icon>
            <ion-icon name="logo-playstation"></ion-icon>
          </div>
          name of the game
          <div className="favourites">
            {/* <ion-icon name="heart"></ion-icon> */}
            {/* <!-- or  --> */}
            <ion-icon name="heart-dislike"></ion-icon>
          </div>
        </div>
      </a>
    </div>
    );
  }

    return (
      <nav className="goodsList">
        <div className='wrapper'>
          {cards}
        </div>
        <div className='wrapper'>
          {cards}
        </div>
        <div className='wrapper'>
          {cards2}
        </div>
        <div className='wrapper'>
          <div className="cardContainer">
            <a href='./cart' className="card">
              <div className="imgContainer">
                <img className="cardImageBG" src={imgsrc1.src} />
                <img className="cardImage" src={imgsrc1.src} />
              </div>
              <div className="description">
                <div className="platforms">
                  <ion-icon name="logo-windows"></ion-icon>
                  <ion-icon name="logo-xbox"></ion-icon>
                  <ion-icon name="logo-playstation"></ion-icon>
                </div>
                name of the game
                <div className="favourites">
                  {/* <ion-icon name="heart"></ion-icon> */}
                  {/* <!-- or  --> */}
                  <ion-icon name="heart-dislike"></ion-icon>
                </div>
              </div>
            </a>
          </div>
        </div>
      </nav>
      );
    }