$(function(){
     var modalBg = $('.conteiner-modal');
     var modalCadastrar = $('.modal-cadastrar');
     var modalLogar = $('.modal-logar');

     //faz aparecer LOGAR, e cadastrar desaparecer
     $('.logar').click(function(event) {
     	modalBg.show();	
     	modalLogar.show('slow');
     	modalCadastrar.hide();
     	  
     });

     //faz aparecer CADASTRAR, e logar desaparecer
     $('.cadastrar').click(function(event) {
     	modalBg.show();	
     	modalCadastrar.show('slow');
     	modalLogar.hide();
     	
     	
     });

     //fazer fechar -- os dois
     $('.fechar').click(function(event) {
     	modalBg.hide();	
     	modalLogar.hide();
     	modalCadastrar.hide();

     });


     


});