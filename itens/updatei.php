<?php 
	$acao = null;
	$parametro = null;
	if(isset($_POST['acao'])){
		$parametro = $_POST['parametro'];
		$acao = $_POST['acao'];
	}

	if($acao == "update"){
		echo json_encode($parametro);
	}







?>