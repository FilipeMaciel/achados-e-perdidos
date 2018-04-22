<?php 
	include ("bd/Conexao.class.php");

	public class Item{


		private $ids;

		private $nome_item;
		private $nome_pessoa;
		private $local;
		private $descricao;
		private $data;
		private $status;
		private $imagem;
		private $id_usuario;
		private $BANCO;

		function __construct(){
			$BANCO=new Conexao();
		}

		public function find($id){
			$query="SELECT * FROM intens WHERE id=:id";
			
			$prepare=$BANCO->prepare($query);
			$prepare->bindValue(':id',$id,PDO::PARAM_STR);
			$prepare->execute();	
			$object=$prepare->fetchObject();

		}

	}
 ?>