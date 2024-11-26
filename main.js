startTime();
setInterval("startTime()", 1000);

function startTime()
{
   var today = new Date();
   var localTime = today.toLocaleTimeString();
   var ThisDay=today.getDate();
   var ThisMonth=today.getMonth()+1;
   var ThisYear=today.getFullYear();  

  var MonthTxt = new Array("", "January", "February", "March", "April", "May", 
  "June", "July", "August", "September", "October","November", "December");

   document.getElementById("currentdate").innerHTML = MonthTxt[ThisMonth] + " " + ThisDay + ", " + ThisYear + " " + localTime;
} 


let slideIndex = [1,1];
let slideId = ["mySlides1"]
showSlides(1, 0);
showSlides(1, 1);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
  let i;
  let x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}    
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex[no]-1].style.display = "block";  
}