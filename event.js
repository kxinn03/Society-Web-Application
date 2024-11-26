function myFunction() {
  
      alert("The Activity Will Be Delete.");
 

}

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

var mybutton = document.getElementById("myBtn");


window.onscroll = function() {scrollFunction()};

function scrollFunction() 
{
    if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) 
    {
        mybutton.style.display = "block";
    } 
    else 
    {
        mybutton.style.display = "none";
    }
}

function topFunction() 
{
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

