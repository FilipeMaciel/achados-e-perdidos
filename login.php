
<?php
	include("classes/DB.php");
	include("classes/models/Sistemalogin.class.php");
	
	try{ 
		$conn = new DB();
		if(isset($_POST["login"])){
			$email = $_POST["email"];
			$senha = $_POST["senha"];

			$ver="SELECT * FROM usuarios WHERE  email = :email AND senha =:senha";
			
			$slc = $conn->prepare($ver);

			$slc->bindValue(':email',$email,PDO::PARAM_STR);
			$slc->bindValue(':senha',$senha,PDO::PARAM_STR);
			$slc->execute();

			if ($slc->rowCount() == 0) {
				//email nao existe para fazer login
				header("Location: erro.php");		
			}else{
				$dados = $slc-> fetchObject();
				$id = $dados->id;
				$tipo = $dados->tipo;

				$SL = new SistemaLogin();
				$SL->criarCookies($id,$email,$tipo);
				header("Location: index.php");
			}
		}
	}
    catch(PDOException $e) {
        header("Location: error.php");
    }
?>