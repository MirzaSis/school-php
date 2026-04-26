// JavaScript Document
function post(url, cFunction) {
  const xhttp = new XMLHttpRequest();
  xhttp.onerror=function() {cFunction(this); }
  xhttp.onreadystatechange=function() {cFunction(this); }
  xhttp.onload = function() {cFunction(this);}
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.open("POST", url);
  xhttp.send();
}
/*
 روش استفاده مثل زیر خواهد بود
loadDoc("url-1", myFunction1);

loadDoc("url-2", myFunction2);

function myFunction1(xhttp) {
  // action goes here
}
function myFunction2(xhttp) {
  // action goes here
}
*/
