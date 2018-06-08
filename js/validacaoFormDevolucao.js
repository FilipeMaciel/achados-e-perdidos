
$(document).ready(function(){
	console.log("Entrou");


	$('#formDevolucao').validate({
		
		rules:{
			name:{
				required: true,
				minlength: 6
			},

			ident:{
				required: true,
				minlength: 14
				maxlength: 14
			},

			telefone:{
				minlength: 16
			},

			email:{
			  required: true,
			  email: true
			}

		},
		messages:{
			name:{
			required: "Este campo é obrigatório!",
			minlength: "Quantidade de caracteres abaixo do esperado"
			},

			ident:{
				required: "Este campo é obrigatório!",
				minlength: "A matrícula deve conter  14 caracteres"
				maxlength: "A matrícula deve conter apenas 14 caracteres"
			},

			telefone:{
				minlength: "Quantidade de caracteres invalido"
			},

			email:{
			  required: "Este campo é obrigatório!",
			  email: "E-mail invalido"
			}
		}

	});

});