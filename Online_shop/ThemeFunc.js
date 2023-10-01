// $('document').ready(function(){
//     currLayer = localStorage.getItem("themeLayer");
//     SetTheme();
// });

const layers = ["pinky", "day", "night"];
let currLayer = 0;
function ChangeThemeStyle(){
    currLayer = (currLayer+1)%3;
    SetTheme();
    localStorage.setItem("themeLayer", currLayer);
}
function SetTheme(){
    var out = '@layer ';
    out +=layers[currLayer]+', ';
    out +=layers[(currLayer+1)%3]+', ';
    out +=layers[(currLayer+2)%3];
    out +=';'
    $('#themeStyle').html(out);
}



const body = document.querySelector("body");
const header = document.querySelector(".header");
const headerLinks = document.querySelectorAll(".links > a");

SetHeaderStyle();
function SetHeaderStyle() {
    // console.log(body.getBoundingClientRect().y);
    if (body.getBoundingClientRect().y < 0) {
        header.style.cssText = `background-color: var(--header-bg-color);
                                box-shadow: 5px 5px 15px 5px var(--header-shadow-color);`;
        headerLinks.forEach((link) => link.style.cssText = `color: var(--main-bg-color)`);
    } else {
        header.style.cssText = `background-color: rgba(0, 0, 0, 0);`;
        headerLinks.forEach((link) => link.style.cssText = `color: var(--header-font-color);`);
    }

    requestAnimationFrame(SetHeaderStyle);
}