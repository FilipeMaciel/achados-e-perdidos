<?php
	include("../classes/DB.php");
	include "../classes/models/Categoria.class.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/Crud.php";

	if(isset($_POST["cadastro"])){

		$nome=$_POST["nome"];

		$insert= new Categoria();
		$return= $insert->insert($nome);
		header("Location: ../index.php");
	}
	if(isset($_POST["update"])){
		$id=$_POST["id"];
		$nome=$_POST["nome"];

		$insert= new Categoria();
		$return= $insert->update($nome,$id);
		header("Location: listagemCategoria.php");
		
	}
	
	
?>