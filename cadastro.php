
<?php
require_once "classes/models/Usuario.php";
require_once "classes/DB.php";
	$conn= new DB();
	//branch
	//$conn=mysqli_connect("localhost","root","","achados") or die ("ERROR");
		
		if (isset($_POST["cadastrar"])) {
			$nome=($_POST["nome"]);
			$email=($_POST["email"]);
			$senha=($_POST["senha"]);
			$telefone=($_POST["telefone"]);
			$tipo=($_POST["tipo"]);

            $user = new Usuario();
			$query= "SELECT * FROM usuarios WHERE email=:email";
			
			$prepare= $conn->prepare($query);
			$prepare->bindValue(':email',$email, PDO::PARAM_STR);
			$prepare-> execute();

			$row= $prepare->rowCount();

			if($row != 0) {
				echo "O email utilizados ja existe em nossa base de dados";
				return false;
			}else{
                #instancia a classe Usuarios e passa os parametros para o construtor
                //$user = new Usuario($nome, $email, $senha, $telefone, $tipo);

				if($resp = $user->insert($nome, $email, $senha, $telefone, $tipo)){
					header("Location: index.php");	

                }else{
				    var_dump($resp);
				    echo "Falha ao inserir dados";
                }

			}
		}

		if (isset($_POST["atualizar"])) {
			$id=($_POST["id"]);
			$nome=($_POST["nome"]);
			$email=($_POST["email"]);
			$senha=($_POST["senha"]);
			$telefone=($_POST["telefone"]);
			$tipo=($_POST["tipo"]);

            $user = new Usuario();
			
			$user->update($id,$nome, $email, $senha, $telefone, $tipo);
					header("Location: user/user.php");	

            }else{
				    var_dump($resp);
				    echo "Falha ao inserir dados";
                }

			
		
?>
		