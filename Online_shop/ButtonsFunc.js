$('document').ready(function(){
    currLayer = localStorage.getItem("themeLayer");
    SetTheme();
});

const layers = ["pinky", "day", "night"];
let currLayer = 0;

function ChangeThemeStyle(){
    currLayer = (currLayer+1)%3;
    SetTheme();
    console.log(currLayer);
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

const menu = document.querySelector(".phone_links");

function ActivateMenu(){
    menu.classList.toggle("phone_links_active");
}

const body = document.querySelector("body");
const header = document.querySelector(".header");

SetHeaderStyle();
function SetHeaderStyle(){
    // console.log(body.getBoundingClientRect().y);
    if (body.getBoundingClientRect().y < 0)
        header.style.cssText = `background-color: var(--header-bg-color);
                                box-shadow: 5px 5px 15px 5px var(--header-shadow-color);`;
    else
        header.style.cssText = `background-color: rgba(0, 0, 0, 0);`;

    requestAnimationFrame(SetHeaderStyle);
}

function ShowImg(){
    const inpt = document.getElementById("ImgInpt");
    const fileName = document.getElementById("filename");
    let name = inpt.value.split('\\');
    fileName.innerHTML = (name[name.length-1]);
}


function ClearSearchPanel(){
    const searchField = document.querySelector(".search");
    searchField.value = "";
}
