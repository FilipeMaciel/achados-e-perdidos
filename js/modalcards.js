


$(function(){

	$('.modal-atualizar').click(function() {
		var id = $(this).closest('.card').find('.id-card').val();
		var modalBg = $('.bg-modal-card');
		var modalUpdate = $('.conteiner-update');
        var remove = $(this).closest('.card').find('.cont-image-update');
        remove.remove();
        console.log( $(this).closest('.card').find('.img-modal'));
		modalBg.show();
		modalUpdate.show();

		console.log(id);

		$.ajax({
                  url: './itens/updatei.php',
                  type: 'post',
                  dataType: 'json',
                  data: {
                      acao: 'update',
                      parametro: id

                  },
                  success: function (data) {
                      console.log(data);
                      $("input[type=text][name=nome]").val(data.nome_item);
                      $("input[type=text][name=nome_pessoa]").val(data.nome_pessoa);
                      $("input[type=text][name=local]").val(data.local_encontrado);
                      $("input[type=text][name=descricao]").val(data.descricao);
                      $("input[type=text][name=nome_item]").val(data.nome_item);
                      $("<img class='img-modal' src='upload/"+data.imagem+"'>").appendTo(".cont-image-update");
                  },
                  error: function (data) {
                      console.log(data);
                  }
              });

	});

});