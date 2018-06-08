
$(document).ready(function(){
	console.log("Entrou");

	$('#formLogin').validate({
		rules:{
			email:{
			  required: true,
			  email: true	
			},
			senha:{
				required: true,
				rangelength: [6,15]

			}
			
		},
		messages:{
			email:{
			  required: "Este campo é obrigatório",
			  email: "E-mail inválido"	
			},
			senha:{
				required: "Este campo é obrigatório",
				rangelength: "A senha é entre 6 e 15 caracteres"

			}
		}

	});

});