
$(document).ready(function(){
	console.log("Entrou");

	$('#tel').mask('(00) 0 0000-0000');

	$('#formCadItem').validate({
		rules:{
			nome:{
				required: true,
				minlength: 6
			},

			categorias:{
				required: true
			},

			nome_pessoa:{
				required: true

			},

			local:{
				required: true
			},

			descricao:{
				required: true
			},

			imagemSelecionar:{
				required: true
			}

		}, 
		messages:{
			nome:{
				required: "Este campo é obrigatório",
				minlength: "Nome muito curto"
			},

			categorias:{
				required: "Este campo é obrigatório"
			},

			nome_pessoa:{
				required: "Este campo é obrigatório"

			},

			local:{
				required: "Este campo é obrigatório"
			},

			descricao:{
				required: "Este campo é obrigatório"
			},

			imagemSelecionar:{
				required: "Este campo é obrigatório"
			}	
		}
	});


});