


$(function(){

	$('.modal-atualizar').click(function() {
		var id = $(this).closest('.card').find('.id-card').val();
		var modalBg = $('.bg-modal-card');
		var modalUpdate = $('.conteiner-update');

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
                      
                  },
                  error: function (data) {
                      console.log(data);
                  }
              });

	});

});