$(document).ready(function(){
        
    $(".btncard").click(function(){
        
        $(".warning").fadeIn();
        $(".dark").fadeIn();       

    });

    $(".dark").click(function(){

        $(".dark").fadeOut();       
        $(".warning").fadeOut();
        $(".mywarning").fadeOut();
        $(".intendedwarning").fadeOut();
    });

    $(".infobtn").click(function(){
        
        $(".warning").fadeIn();
        $(".dark").fadeIn();       

    });

    $(".mycard").click(function(){
        
        $(".mywarning").fadeIn();
        $(".dark").fadeIn();       

    });

    $(".intendedcard").click(function(){
        
        $(".intendedwarning").fadeIn();
        $(".dark").fadeIn();       

    });

    $("#top").click(function(){
        $("html , body").animate({scrollTop : 0} , 2000)
    });

    $(".hovercard").mouseenter(function(){

        $(this).addClass("hover-card");
    });

    $(".icon").mouseenter(function(){

        $(this).addClass("hovericon");
    });

    $(".hoverbtn").mouseenter(function(){
        $(this).css("background-color" , "#cacece");
    });

    $(".hoverbtn").mouseleave(function(){
        $(this).css("background-color" , "#4c8f8f");
    });

    $(".set_race").click(function(){
        $(".intendedrace").css("display" , "none");
        $(".myrace").css("display" , "none");
        $(".setrace").css("display" , "block");
    });

    $(".my_race").click(function(){
        $(".setrace").css("display" , "none");
        $(".intendedrace").css("display" , "none");
        $(".myrace").css("display" , "block");
    });

    $(".intended_race").click(function(){
        $(".setrace").css("display" , "none");
        $(".myrace").css("display" , "none");
        $(".intendedrace").css("display" , "block");
    });

});

//slide show
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demodots");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}