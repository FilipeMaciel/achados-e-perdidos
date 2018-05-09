$(function(){
   
   var i = 0;
   function effect(element, time){
   	  var tamanhoP = Number($('#'+element).width());
   	  $('#'+element+' li').css('width', tamanhoP+'px');

   	  var qtdLi = $('#'+element+' li').length;
      var wdUl = tamanhoP*qtdLi;
      $('#'+element+' ul').css('width', wdUl+'px'); 
   	  var qtd = qtdLi-1;

   	  $('#prev').on('click', function(e){
   	  	e.preventDefault();
   	  	if(i < qtd){
           $('#'+element+' ul').animate({marginRight:'-='+tamanhoP}, 600);
           i--;
   	  	}else if(i == qtd){
           $('#'+element+' ul').animate({marginRight:'-='+0}, 600);
           i=0;
   	  	}
   	  	console.log(i);

   	  });

   	  $('#next').on('click', function(e){
   	  	e.preventDefault();
   	  	if(i > 0){
          $('#'+element+' ul').animate({marginRight:'+='+tamanhoP},600);
          i++;
   	  	}else{
   	  	  $('#'+element+' ul').animate({marginRight:'+='+(tamanhoP*qtd)},600);
          i=qtd;
   	  	}
   	  	//console.log(i);

   	  });
   }

   effect('slider', 3000);
  
});