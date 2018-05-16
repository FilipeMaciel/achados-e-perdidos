<?php
	include("../classes/DB.php");
	include "../classes/models/Categoria.class.php";
	include_once $_SERVER['DOCUMENT_ROOT']."achados-e-perdidos/classes/Crud.php";

	if(isset($_POST["cadastro"])){

		$nome=$_POST["nome"];

		$insert= new Categoria();
		$return= $insert->insert($nome);
	}
	if(isset($_POST["upadte"])){

		$nome=$_POST["nome"];

		$insert= new Categoria();
		$return= $insert->update($nome);
	}
	
	
?>