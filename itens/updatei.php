<?php

include "../classes/models/Item.class.php";
include_once $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/Crud.php";

	$acao = null;
	$parametro = null;
	if(isset($_POST['acao'])){
		$parametro = $_POST['parametro'];
		$acao = $_POST['acao'];
	}

	if($acao == "open_update"){
	    $itens = Item::findItens($parametro);
		echo json_encode($itens);
	}







?>