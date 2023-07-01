
window.onload = function(){
    const parall = document.querySelector(".Parallax_BG");
    if (!parall)return;

    const content = document.querySelector(".text_container");
    const main_content = document.querySelector(".main_content");
    const mountains3 = document.querySelector(".mountains3");
    const mountains2 = document.querySelector(".mountains2");
    const mountains1 = document.querySelector(".mountains1");
    const trees = document.querySelector(".trees");
    const sun = document.querySelector(".sun");
    const pic = document.querySelector(".pic");
    const point = document.querySelector(".Point");

    const mountains1Speed = 35;
    const mountains2Speed = 90;
    const mountains3Speed = 0;
    const treesSpeed = 10;
    const sunSpeed = 10;


    const overall_speed = 0.05;

    let posX = 0, posY = 0;
    let coordX = 0, coordY = 0;

    let windY = window.pageYOffset;

    function SetMouseStyle(){
        
        // element.getBoundingClientRect().y //relative to the viewport
        // element.getBoundingClientRect().y+window.pageYOffset //relative to the document
        if(pic.getBoundingClientRect().y < window.pageYOffset){
            pic.style.cssText = `position: fixed; 
                                 left: 20px;
                                 top:200px;`;
        }
        if(point.getBoundingClientRect().y < pic.offsetHeight + pic.getBoundingClientRect().y){
            pic.style.cssText = `position: absolute;
                                 top: ${(1100 - pic.offsetHeight + 200)}px`;
            point.style.cssText = `color: rgb(230, 230, 230);`;
            point.classList.add("slideTop");
        }
        else if (main_content.getBoundingClientRect().y >= 10){
            pic.style.cssText = `position: absolute;`;
        }

        const distX = coordX - posX;
        const distY = coordY - posY;

        windY = window.pageYOffset;

        posX = posX + (distX * overall_speed)
        posY = posY + (distY * overall_speed)

        mountains3.style.cssText = `transform: translate(${posX/mountains3Speed}%,${posY/mountains3Speed}%);`;
        mountains2.style.cssText = `transform: translate(${posX/mountains2Speed}%,${posY/mountains2Speed}%);`;
        mountains1.style.cssText = `transform: translate(${posX/mountains1Speed}%,${posY/mountains1Speed}%);`;
        trees.style.cssText = `transform: translate(${posX/treesSpeed}%,${posY/treesSpeed}%);`;
    
        requestAnimationFrame(SetMouseStyle);
    }
    SetMouseStyle();

    parall.addEventListener("mousemove", function(e){
        const parallW = parall.offsetWidth;
        const parallH = parall.offsetHeight;

        const coordsX = e.pageX - parallW/2;
        const coordsY = e.pageY - parallH/2;

        coordX = coordsX/parallW*100;
        coordY = coordsY/parallH*100;

    });


    let threasholdSets = [];
    for (let i = 0; i <= 1.0; i+=0.001){
        threasholdSets.push(i);
    }
    const callback = function(etries, observer){
        const scrollTopPercent = window.pageYOffset/parall.offsetHeight*100;
        SetParallStyle(scrollTopPercent);
    }
    const observer = new IntersectionObserver(callback, {
        threshold: threasholdSets
    });

    observer.observe(document.querySelector(".main_content"));

    function SetParallStyle(scrollTopPercent){
        content.style.cssText = `transform: translate(0%, -${scrollTopPercent / 10}%);`;
        trees.parentElement.style.cssText = `transform: translate(0%, -${scrollTopPercent / 3}%);`;
        mountains1.parentElement.style.cssText = `transform: translate(0%, -${scrollTopPercent / 10}%);`;
        mountains2.parentElement.style.cssText = `transform: translate(0%, -${scrollTopPercent / 20}%);`;
        mountains3.parentElement.style.cssText = `transform: translate(0%, -${scrollTopPercent / 30}%);`;
        sun.style.cssText = `transform: translate(0% ,-${scrollTopPercent / 10}%);`;
    }


}

