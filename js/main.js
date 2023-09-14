//// count up seconds////
let interval1 = null;
var theSeconds = document.getElementById('theSeconds');
var theSecondsString = document.getElementById('theSeconds').innerText; 
var theSecondsNumber = Number(theSecondsString);

function countUpSecond(){
    theSecondsNumber++;
    moduloNum = theSecondsNumber % 4;
    changeColor(moduloNum);
    let numFormat = new Intl.NumberFormat('de-DE').format(theSecondsNumber);
    theSeconds.innerText = `${numFormat}`;
}

function countUpSecondInterval(){
    if( interval1 ){
        return 
    }
    interval1 = setInterval(countUpSecond, 1000); // calls timer() alle Sekunden, bzw. 1000 Milisekunden
}

function changeColor(moduloNumParam){
	if( moduloNumParam == 0 ){ theSeconds.style.color = "#b3ecff"; }
    if( moduloNumParam == 1 ){ theSeconds.style.color = "#4dd2ff"; }
    if( moduloNumParam == 2 ){ theSeconds.style.color = "#00ace6"; }
    if( moduloNumParam == 3 ){ theSeconds.style.color = "#006080"; }
}

countUpSecond();
countUpSecondInterval();


//// count up minutes////
let interval2 = null;
var theMinutes = document.getElementById('theMinutes');
var theMinutesString = document.getElementById('theMinutes').innerText; 

var theMinutesNumber = Number(theMinutesString);

function countUpMinutes(){
    theMinutesNumber++;
    let numFormat2 = new Intl.NumberFormat('de-DE').format(theMinutesNumber);
    theMinutes.innerText = `${numFormat2}`;
}

function countUpMinutesInterval(){
    if( interval2 ){
        return 
    }
    interval2 = setInterval(countUpMinutes, 60000); // calls timer() alle Sekunden, bzw. 1000 Milisekunden
}

countUpMinutes();
countUpMinutesInterval();


//// hide/ show Elements ////

var hideElements = document.getElementsByClassName('hideElements');
var i;
for( i = 0; i < hideElements.length; i++){
        hideElements[i].style.display = 'none';
}

var showElements = document.getElementsByClassName('showElements');
var x;
for( x = 0; x < showElements.length; x++){
        showElements[x].style.display = 'block';
}

//// Internationalization number format ////
// let num = 299999;
// let numFormat = new Intl.NumberFormat('de-DE').format(num);


// American region -> 299,999
// European region -> 299.999
// console.log( new Intl.NumberFormat('en-US').format(num));
// console.log( new Intl.NumberFormat('de-DE').format(num));
// console.log("Fuck Off!!!");



