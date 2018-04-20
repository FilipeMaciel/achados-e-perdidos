
<?php 
	include ("itens/bd/Conexao.class.php");
	$conn= new Conexao();
	//$conn=mysqli_connect("localhost","root","","achados") or die ("ERROR");
		
		if (isset($_POST["cadastrar"])) {
			$nome=($_POST["nome"]);
			$email=($_POST["email"]);
			$senha=($_POST["senha"]);
			$telefone=($_POST["telefone"]);
			$tipo=($_POST["tipo"]);
			
			$query= "SELECT * FROM usuarios WHERE email=:email";
			
			$prepare= $conn->prepare($query);
			$prepare->bindValue(':email',$email, PDO::PARAM_STR);
			$prepare-> execute();

			$row= $prepare->rowCount();

			if($row != 0) {
				echo "Dados incorretos...";
			}else{
				$insert=("INSERT INTO usuarios (nome, email, senha,telefone,tipo)VALUES(:nome,:email,:senha,:telefone,:tipo)");

				$ist=$conn-> prepare($insert);
				$ist->bindValue(':nome',$nome,PDO::PARAM_STR);
				$ist->bindValue(':email',$email,PDO::PARAM_STR);
				$ist->bindValue(':senha',$senha,PDO::PARAM_STR);
				$ist->bindValue(':telefone',$telefone,PDO::PARAM_STR);
				$ist->bindValue(':tipo',$tipo,PDO::PARAM_STR);
				$ist->execute();


				echo "Conta registrada, inicie sessão...";
			}
		}
?>
		