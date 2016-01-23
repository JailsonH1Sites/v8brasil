// JavaScript Document

$(document).ready(function(){
	
		$('.menu-mobile').click(function(){
				$('#menu-top-menu').slideToggle();
			
			})
		
		$(window).resize(function(){
				if ( $(window).width() > 1020){
					$('#menu-top-menu').removeAttr('style');
					}
			
			})
		
	});





$(document).ready(function(){
	
		$('#registro').click(function(){
				$('#sidebar').slideToggle();
			
			})
		
		$(window).resize(function(){
				if ( $(window).width() > 1020){
					$('#sidebar').removeAttr('style');
					}
			
			})
		
	});


//sumir botao voltar ao topo
		$(function(){   
			var nav = $('#paisubir');   
			$(window).scroll(function () { 
				if ($(this).scrollTop() > 300) { 
					nav.removeClass("sumir"); 
				} else { 
					nav.addClass("sumir"); 
				} 
			});  
		});



//BOTÃO VOLTAR AO TOPO
    $(document).ready(function() {
       $('#subir').click(function(){ 
          $('html, body').animate({scrollTop:0}, 'slow');
      return false;
         });
     });

//facebook

(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3&appId=351025968352414";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));