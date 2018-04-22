<?php 
	include ("../Crud.php");

	 class Item extends Crud {

		private $id;

		private $nome_item, $nome_pessoa, $local, $descricao, $data, $status, $imagem, $id_usuario;

		public function __construct($nome_item, $nome_pessoa, $local, $descricao, $data, $status, $imagem, $id_user){

        }

     }
 ?>