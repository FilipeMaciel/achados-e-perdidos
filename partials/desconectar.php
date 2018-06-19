<?php 
include ("../login.php");
	
		$logout = new SistemaLogin();
		$logout->excluirCookies($_COOKIE["email"],$_COOKIE["id"],$_COOKIE["tipo"]);
	
 ?>
