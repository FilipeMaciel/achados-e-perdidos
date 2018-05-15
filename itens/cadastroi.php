
<?php 
	include("../classes/DB.php");
	include "../classes/models/Item.class.php";
	include_once $_SERVER['DOCUMENT_ROOT']."achados-e-perdidos/classes/Crud.php";

	
	//$connect = mysqli_connect("localhost","root","","achados") or die("ERROR");

	if (isset($_POST["cadastro"])) {
		$nome_item=($_POST["nome"]);
		$nome_pessoa=($_POST["nome_pessoa"]);
		$local=($_POST["local"]);
		$descricao=($_POST["descricao"]);
		$data=date("Y-m-d h:i:s");
		$imagem=($_FILES["userfile"]);
		$categoria=($_POST["categorias"]);
		$status=0;
		$id=($_COOKIE["id"]);

        $item = new Item();
        $return = $item->insert($nome_item, $nome_pessoa, $local, $descricao, $imagem, $data, $status,$categoria);
       
      	
		echo "certo".$categoria;

		}

		

//*****************ATUAILIZAR******************
		if (isset($_POST["update"])) {
			$acao = 0;
		$nome_item=($_POST["nome"]);
		$nome_pessoa=($_POST["nome_pessoa"]);
		$local=($_POST["local"]);
		$descricao=($_POST["descricao"]);
		$data=date("Y-m-d h:i:s");
		$status=0;
		$id=($_POST["id"]);
		if ($_FILES["userfile"]['size'] == 0) {
			$imagem= Crud::findItens($id)->imagem;
			$acao = 1;

		}else{
			$imagem=($_FILES["userfile"]);
		}
		$aimage = [
			"acao" => $acao,
			"image" => $imagem
		];

        $item = new Item();
        $return = $item->update($id,$nome_item,$nome_pessoa,$local,$descricao,$data,$aimage,$status);
		echo "Atualizado";
	}
 ?>