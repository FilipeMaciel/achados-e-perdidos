
<?php 
	include("../classes/DB.php");
	include "../classes/models/Item.class.php";

	$conn= new DB();
	
	//$connect = mysqli_connect("localhost","root","","achados") or die("ERROR");

	if (isset($_POST["cadastro"])) {

		$nome_item=($_POST["nome"]);
		$nome_pessoa=($_POST["nome_pessoa"]);
		$local=($_POST["local"]);
		$descricao=($_POST["descricao"]);
		$data=date("Y-m-d h:i:s");
		$imagem=($_FILES["userfile"]);
		
		$status=0;
		$id=($_COOKIE["id"]);

        $item = new Item();
        $return = $item->insert($nome_item, $nome_pessoa, $local, $descricao, $imagem, $data, $status);
      
		}

		if (isset($_POST["update"])) {

		$nome_item=($_POST["nome"]);
		$nome_pessoa=($_POST["nome_pessoa"]);
		$local=($_POST["local"]);
		$descricao=($_POST["descricao"]);
		$data=date("Y-m-d h:i:s");
		$imagem=($_FILES["userfile"]);
		$status=0;
		$id=($_POST["id"]);

        $item = new Item();
        $return = $item->update($id,$nome_item,$nome_pessoa,$local,$descricao,$data,$status,$imagem);
        echo $return;
		echo "Atualizado";
	}
 ?>