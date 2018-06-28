$(function(){

     var modalBg = $('.conteiner-modal');
     var fundo = $('.bg-modal')
     var modalCadastrar = $('.modal-cadastrar');
     var modalLogar = $('.modal-logar');
     var modalUpdate = $('.modal-update');
     var bgModalUpdate = $('.bg-modal-card');
     var modalUpdate = $('.conteiner-update');
     var modalCategoria = $('.modal-categoria');
     var modalItens = $('.modal-itens');



     $('.logar').click(function(event) {
     	fundo.show();
     	modalBg.show();
     	modalLogar.show('slow');
     	modalCadastrar.hide();
     	modalUpdate.hide();
     	modalCategoria.hide();


     });

     $('.cadastrar').click(function(event) {

         fundo.show();
     	modalBg.show();	
     	modalCadastrar.show('slow');
     	modalLogar.hide();
     	modalUpdate.hide();
     	modalCategoria.hide();
     	modalItens.hide();
     });


    $('.categoria').click(function (event) {
        modalCategoria.show('slow');
        fundo.show();
        modalBg.show();
        modalLogar.hide();
        modalCadastrar.hide();
        modalUpdate.hide();
        modalItens.hide();
    });

    $('.itens').click(function (event) {
        modalItens.show('slow');
        fundo.show();
        modalBg.show();
        modalLogar.hide();
        modalCadastrar.hide();
        modalCategoria.hide();
        modalUpdate.hide();
    });


     $('.bg-modal').click(function(event) {
     	modalBg.hide();	
     	modalLogar.hide();
     	modalCadastrar.hide();
     	modalUpdate.hide();
     	bgModalUpdate.hide();
     	modalUpdate.hide();
     	fundo.hide();
     	modalCategoria.hide();
     	modalItens.hide();

     });

});