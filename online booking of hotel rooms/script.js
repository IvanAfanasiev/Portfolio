const links = document.getElementsByClassName("a_link");
console.log(links);
for(let i=0; i<links.length; i++)
    links[i].addEventListener("click", ()=> OnToggleMobileMenu());



function OnToggleMobileMenu(){
    let mobileMenu = document.getElementById("_mobile_menu");
    let menuBtn = document.getElementById("_ToggleMobileMenu");
    mobileMenu.classList.toggle('Active')
    menuBtn.classList.toggle('BtnActive')
}
