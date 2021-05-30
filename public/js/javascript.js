$(document).ready(function(){
  $(".btn1").click(function(){
    $(".hideshow").fadeOut();
  });
  $(".btn2").click(function(){
    $(".hideshow").fadeIn();
  });
	  $(".btn1-odd").click(function(){
    $(".hideshow-odd").fadeOut();
  });
  $(".odd").click(function(){
    $(".hideshow-odd").fadeIn();
  });
$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	});
});