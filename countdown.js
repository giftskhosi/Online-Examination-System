let timer;
let hour = parseInt(2);
let minute = parseInt(0);
let second = parseInt(0);

function startTimer(){
    showTime();
    
    timer = setInterval('downTimer()', 1000);
}

function showTime(){
    document.getElementById('hour').innerText = hour < 10 ? `0${hour}` : hour;
    document.getElementById('minute').innerText = minute < 10 ? `0${minute}` : minute;
    document.getElementById('second').innerText = second < 10 ? `0${second}` : second;
}

function downTimer(){
    if (second > 0 && second < 60){
        second -= 1;
    } else if (minute > 0){
        minute -= 1;
        if (minute < 1 && hour > 0){
            hour -= 1;
            minute = 60;
            second = 59;
        } else {
            second = 59;
        }
    } else if (hour > 0){
        hour -= 1;
        minute = 59;
        second = 59;
    } else {
        hour = minute = second = 0;

        clearInterval(timer);
        alert('Timer Over!');
    }
    showTime();
}

window.onload = startTimer();