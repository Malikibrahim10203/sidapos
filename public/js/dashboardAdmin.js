window.onload = function(){
    document.getElementById('button-toggle').click();
  }

document.getElementById("button-toggle").addEventListener("click", () => {
    document.getElementById("sidebar").classList.toggle("active-sidebar");
    
    document.getElementById("main-content").classList.toggle("active-main-content");
    document.getElementById("nav-content").classList.toggle("active-main-content");
});

$(document).ready(function(){
  $('.dropdown-toggle').dropdown();
});
