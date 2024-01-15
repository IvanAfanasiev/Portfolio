const button = document.getElementById("_save-btn");
const timerText = document.getElementById("_timerText");
const saveText = document.getElementById("_save-btn-text");
const saveIcon = document.getElementById("_save-icon");


let currDay = new Date();
let startTime = new Date();
let isRecording = false;

function ToggleTimer(){
    if (!isRecording){
        currDay = new Date();
        startTime = currDay.setMinutes(currDay.getMinutes());
        newInterval = setInterval(UpdateTimer, 500);
        console.log("timer run");
        saveText.innerHTML = "Recording...";
        saveIcon.setAttribute("name", "stop");
        isRecording = true;
    }
    else{
        clearInterval(newInterval);
        console.log("timer stop");
        saveText.innerHTML = "Record";
        saveIcon.setAttribute("name", "play");
        timerText.innerHTML = "0:00:00";
        isRecording = false;
    }
    ToggleClassButtons();
}
function UpdateTimer(){
    let now = new Date().getTime();
    let distance = now - startTime;

    let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    let seconds = Math.floor((distance % (1000 * 60)) / 1000);

    if(minutes < 10)
        minutes = "0"+minutes;
    if(seconds < 10)
        seconds = "0"+seconds;

    timerText.innerHTML = hours + ":"+ 
                          minutes + ":" + 
                          seconds;

    if(distance = 0)
        StopTimer();
}
function ToggleClassButtons(){
    button.classList.toggle("record-active");
}