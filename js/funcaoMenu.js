$(function(){
     var modalBg = $('.conteiner-modal');
     var modalCadastrar = $('.modal-cadastrar');
     var modalLogar = $('.modal-logar');
     var modalUpdate = $('.modal-update')

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
     
     $('.botaoAtualizar').click(function(event) {
          modalBg.show();
          modalUpdate.show('slow');
          modalLogar.hide();
          modalCadastrar.hide();
     });


     //fazer fechar -- os dois
     $('.fechar').click(function(event) {
     	modalBg.hide();	
     	modalLogar.hide();
     	modalCadastrar.hide();
          modalUpdate.hide();

     });

     
     


});