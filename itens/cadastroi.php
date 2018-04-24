
<?php 
	include("../classes/DB.php");
	$conn= new DB();
	
	//$connect = mysqli_connect("localhost","root","","achados") or die("ERROR");

	if (isset($_POST["cadastro"])) {

		$nome_item=($_POST["nome"]);
		$nome_pessoa=($_POST["nome_pessoa"]);
		$local=($_POST["local"]);
		$descricao=($_POST["descricao"]);
		$data=date("Y-m-d h:i:s");
		$imagem=($_POST["imagem"]);
		
		$status=0;
		$id=($_COOKIE["id"]);
		$uploaddir = '/uploads/imagens';
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

			
			if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
   			 echo "Arquivo válido e enviado com sucesso.\n";
			} else {
    			echo "Possível ataque de upload de arquivo!\n";
			}
			echo 'Aqui está mais informações de debug:';
			print_r($_FILES);


		$sql="INSERT INTO intens(nome_item,nome_pessoa,local_encontrado,descricao,data_encontrado,status,imagem,id_usuarios) 
			VALUES (:nome_item,:nome_pessoa,:localenc,:descricao,:data,:status,:imagem,:id)";



		$prepare = $conn->prepare($sql);
		$prepare->bindValue(':nome_item',$nome_item, PDO::PARAM_STR);
		$prepare->bindValue(':nome_pessoa',$nome_pessoa, PDO::PARAM_STR);
		$prepare->bindValue(':localenc',$local, PDO::PARAM_STR);
		$prepare->bindValue(':descricao',$descricao, PDO::PARAM_STR);
		$prepare->bindValue(':data',$data, PDO::PARAM_STR);
		$prepare->bindValue(':status',$status, PDO::PARAM_STR);
		
		$prepare->bindValue(':id',$id, PDO::PARAM_STR);
		$prepare->execute();
		
		
		echo "Item registrado";
		}else{
		die("ERROR");

		}
	

 ?>