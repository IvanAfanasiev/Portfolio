import './style.css'
import imgsrc from '@/images/Mario_series_alternate.svg';


export default function Content() {
    return (

      <div className='cartContainer'>
        <div className="cart_wrapper">
          <div className="cart_imgContainer">
            <img className="cart_cardImageBG" src={imgsrc.src} />
            <img className="cart_cardImage" src={imgsrc.src} />
          </div>    
          <div className="cart_cardContainer">
            <div className="cart_card">
              <div className="cart_platforms">
                <ion-icon name="logo-windows"></ion-icon>
                <ion-icon name="logo-xbox"></ion-icon>
                <ion-icon name="logo-playstation"></ion-icon>
              </div>
              <div className="cart_description">
                <h1>Super Mario!!!</h1>
                A brief (or not) description of the game.
                Perhaps some other information such as average rating, price or number of downloads
              </div>
              <div className="Buy">
                <div className="price">$14.99</div>
                <button className='BuyButtn'>Buy</button>

              </div>
            </div>
          </div> 
        </div>

      </div>
    );
  }
  