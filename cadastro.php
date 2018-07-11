<?php
require_once "classes/models/Usuario.php";
require_once "classes/DB.php";
	try{
		$conn = new DB();

		if (isset($_POST["cadastrar"])) {
			$nome = ($_POST["nome"]);
			$email = ($_POST["email"]);
			$senha = ($_POST["senha"]);
			$telefone = ($_POST["telefone"]);
			$tipo = ($_POST["tipo"]);

            $user = new Usuario();
			
			$query = "SELECT * FROM usuarios WHERE email=:email";
			$prepare = $conn->prepare($query);
			$prepare->bindValue(':email',$email, PDO::PARAM_STR);
			$prepare-> execute();

			$row = $prepare->rowCount();
			if($row != 0) {
				//email já existe 
				header("Location: erro.php");
			}else{
				$user->insert($nome, $email, $senha, $telefone, $tipo);
				header("Location: index.php");	
            }
		}
		if (isset($_POST["atualizar"])) {
			$id = ($_POST["id"]);
			$nome = ($_POST["nome"]);
			$email = ($_POST["email"]);
			$senha = ($_POST["senha"]);
			$telefone = ($_POST["telefone"]);
			$tipo = ($_POST["tipo"]);

            $user = new Usuario();
			$user->update($id,$nome, $email, $senha, $telefone, $tipo);
			header("Location: user/user.php");	
        }
	}
	catch(PDOException $e) {
	   	header("Location: error.php");
	}
?>
		