
<?php
require_once "classes/models/Usuario.php";
require_once "classes/DB.php";
	$conn= new DB();

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
                #instancia a classe Usuarios e passa os parametros para o construtor
                $user = new Usuario($nome, $email, $senha, $telefone, $tipo);
				if($user->insert()){
                    echo "Conta registrada, inicie sessão...";
                }else{
				    echo "Falha ao inserir dados";
                }

			}
		}
?>
		