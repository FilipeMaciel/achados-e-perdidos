
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
		$imagem="jhgjhg";
		$status=0;
		$id=($_COOKIE["id"]);

		/*$insert=mysqli_query($connect,"INSERT INTO intens (nome_item,nome_pessoa,local_encontrado,descricao,data_encontrado,status,imagem,id_usuarios)VALUES('$nome_item','$nome_pessoa','$local','$descricao','$data',0,'$imagem','$id')");
		echo mysqli_error($connect) ;*/
		
		$sql="INSERT INTO intens(nome_item,nome_pessoa,local_encontrado,descricao,data_encontrado,status,imagem,id_usuarios) 
			VALUES (:nome_item,:nome_pessoa,:localenc,:descricao,:data,:status,:imagem,:id)";


		$prepare = $conn->prepare($sql);
		$prepare->bindValue(':nome_item',$nome_item, PDO::PARAM_STR);
		$prepare->bindValue(':nome_pessoa',$nome_pessoa, PDO::PARAM_STR);
		$prepare->bindValue(':localenc',$local, PDO::PARAM_STR);
		$prepare->bindValue(':descricao',$descricao, PDO::PARAM_STR);
		$prepare->bindValue(':data',$data, PDO::PARAM_STR);
		$prepare->bindValue(':status',$status, PDO::PARAM_STR);
		$prepare->bindValue(':imagem',$imagem, PDO::PARAM_STR);
		$prepare->bindValue(':id',$id, PDO::PARAM_STR);
		$prepare->execute();
		
		
		echo "Item registrado";
		}else{
		die("ERROR");

		}
	

 ?>