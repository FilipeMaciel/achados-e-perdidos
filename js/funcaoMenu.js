$(function(){

     var modalBg = $('.conteiner-modal');
     var fundo = $('.bg-modal')
     var modalCadastrar = $('.modal-cadastrar');
     var modalLogar = $('.modal-logar');
     var modalUpdate = $('.modal-atualizar');
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


    $('.botaoAtualizar').click(function (event) {
        modalUpdate.show('slow');
        fundo.show();
        modalBg.show();
        modalLogar.hide();
        modalCadastrar.hide();
        modalItens.hide();
        modalCategoria.hide();
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
     	fundo.hide();
     	modalCategoria.hide();
     	modalItens.hide();

     });



});