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

