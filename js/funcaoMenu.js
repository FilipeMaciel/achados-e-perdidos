$(function(){
     var modalBg = $('.conteiner-modal');
     var modalCadastrar = $('.modal-cadastrar');
     var modalLogar = $('.modal-logar');
     var modalUpdate = $('.modal-update');
     var bgModalUpdate = $('.bg-modal-card');
     var modalUpdate = $('.conteiner-update');

     //faz aparecer LOGAR, e cadastrar desaparecer
     $('.logar').click(function(event) {
     	modalBg.show();	
     	modalLogar.show('slow');
     	modalCadastrar.hide();
          modalUpdate.hide();
     	  
     });

     //faz aparecer CADASTRAR, e logar desaparecer
     $('.cadastrar').click(function(event) {
     	modalBg.show();	
     	modalCadastrar.show('slow');
     	modalLogar.hide();
          modalUpdate.hide();
     	
     });
     
     //fazer fechar -- os dois
     $('.fechar').click(function(event) {
     	modalBg.hide();	
     	modalLogar.hide();
     	modalCadastrar.hide();
          modalUpdate.hide();
          bgModalUpdate.hide();
          modalUpdate.hide();

     });


});