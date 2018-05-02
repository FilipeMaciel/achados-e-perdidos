
<?php 
	include("classes/DB.php");
	$conn= new DB();
	if(isset($_POST["login"])){
		$email=$_POST["email"];
		$senha=$_POST["senha"];
		$ver="SELECT * FROM usuarios WHERE  email=:email AND senha=:senha";
		
		$slc=$conn->prepare($ver);

		$slc->bindValue(':email',$email,PDO::PARAM_STR);
		$slc->bindValue(':senha',$senha,PDO::PARAM_STR);
		$slc->execute();

		if ($slc->rowCount() == 0) {
			echo "Não está cadastrado...";			
		}else{

			$id=$slc->fetchObject();
			$id = $id->id;
			echo "entrou";
			#criando cookies para sessão do usuário
			setcookie("id", $id);
			setcookie("email", $email);
		}

	}
?>