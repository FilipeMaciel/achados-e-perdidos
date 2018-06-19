
<?php 
	include("classes/DB.php");
	include("classes/models/Sistemalogin.class.php");
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
			echo "Tente Novamente";			
		}else{
			$dado=$slc->fetchObject();
			$id = $dado->id;
			$tipo=$dado->tipo;
			
			$SL = new SistemaLogin();
			$SL->criarCookies($id,$email,$tipo);

			header("Location: index.php");
		}

	}
?>