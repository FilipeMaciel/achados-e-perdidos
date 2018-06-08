
$(document).ready(function(){
	console.log("Entrou");

	$('#tel').mask('(00) 0 0000-0000');

	$('#formCadastro').validate({

		rules:{
			nome:{
  				required: true,
  				minlength: 6
  			},

			email:{
			  required: true,
			  email: true
			},

			senha:{
  				required: true,
  				rangelength: [6,15]
  			},

  			senha2:{
  				required: true,
  				equalTo: "#senha2"
  			},

  			telefone:{
  				minlength: 16
  			}
		},
		messages:{
			nome:{
  				required: "Este campo é obrigatório",
  				minlength: "Digite o nome completo"
  			},

			email:{
			  required: "Este campo é obrigatório",
			  email: "E-mail inválido"
			},

			senha:{
  				required: "Este campo é obrigatório",
  				rangelength: "A senha deve conter um numero de caracteres entre 6 e 15"
  			},

  			senha2:{
  				required: "Este campo é obrigatório",
  				equalTo: "As senhas não correspondem"
  			},

  			telefone:{
  				minlength: "Quantidade de caracteres invalida"
  			}
		}
	});	

});