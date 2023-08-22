const timerText = document.getElementById("timerText");
var ButtonOn = document.getElementById("On");
const ButtonOff = document.getElementById("Off");


var currDay = new Date();
var finishTime = new Date();
var reqMinutes = 1; //number of minutes required

function UpdateTimer(){
    var now = new Date().getTime();
    var distance = finishTime - now;

    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    timerText.innerHTML = hours + "h "+ 
                          minutes + "m " + 
                          seconds + "s ";

    if(distance <= 0)
        StopTimer();
}

function StartTimer(){
    currDay = new Date();
    finishTime = currDay.setMinutes(currDay.getMinutes() + reqMinutes);
    
    newInterval = setInterval(UpdateTimer, 500);
    console.log("timer run");
    ToggleClassButtons();
}
function StopTimer(){
    clearInterval(newInterval);
    console.log("timer stop");

    timerText.innerHTML = "0h 0m 0s";
    ToggleClassButtons();
}

function ToggleClassButtons(){
    On.classList.toggle("Active");
    Off.classList.toggle("Active");
}