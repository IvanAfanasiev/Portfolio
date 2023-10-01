const menu = document.querySelector(".phone_links");
function ActivateMenu(){
    menu.classList.toggle("phone_links_active");
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
    document.getElementById('inputSearch').focus();
}



