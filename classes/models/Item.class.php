<?php 
	include ("../Crud.php");

	 class Item extends Crud{

		#atributos da classe Item
		private $id, $nome_item, $nome_pessoa, $local, $descricao, $data, $status, $imagem, $id_usuario;
		//atualizas o iten
        public function update($id,$nome_item,$nome_pessoa,$local,$descricao,$status,$imagem) {
        	$sql ="UPDATE intem SET nome_item=:nome_item, nome_pessoa=:nome_pessoa, local_encontrado=:local, descricao=:descricao,status=:status, imagem=:imagem WHERE id=:id";
        	$prepare = DB::prepare($sql);
        	$prepare->bindValue(':nome_item', $nome_item, PDO::PARAM_STR);
        	$prepare->bindValue(':nome_pessoa', $nome_pessoa, PDO::PARAM_STR);
        	$prepare->bindValue(':local_encontrado', $local, PDO::PARAM_STR);
        	$prepare->bindValue(':descricao', $descricao, PDO::PARAM_STR);
        	$prepare->bindValue(':status', $status, PDO::PARAM_INT);
        	$prepare->bindValue(':imagem', $imagem, PDO::PARAM_INT);
        return $prepare->execute();

        }
        //apaga o iten
        public function delete($id){
        	$delete="DELETE FROM intem WHERE id=:id";
        	$prepare = DB::prepare($delete);
        	$prepare->bindValue(':id', $id, PDO::PARAM_STR);
        	return $prepare->execute();
        }
        //inseri o item
        public function insert ($nome,$nome_pessoa,$local,$descricao,$imagem,
        $data,$status){



	    if (isset($imagem)) {

			$extensao=strtolower(substr($_FILES['userfile']['name'],-4));
			$novaimagem=md5(time()). $extensao;
			$diretorio="imagens/";
			
			move_uploaded_file($_FILES['userfile']['tmp_name'],$diretorio.
				$novaimagem);

        }

        $insert = "INSERT INTO intens(nome_item,nome_pessoa,local_encontrado,descricao,data_encontrado,status,id_usuarios) VALUES(:nome_item,:nome_pessoa,:localenc,:descricao,:data,:status,:id)";
            $prepare = DB::prepare($insert);
            $prepare->bindValue(':nome_item',$nome, PDO::PARAM_STR);
            $prepare->bindValue(':nome_pessoa',$nome_pessoa, PDO::PARAM_STR);
            $prepare->bindValue(':localenc',$local, PDO::PARAM_STR);
            $prepare->bindValue(':descricao',$descricao, PDO::PARAM_STR);
            $prepare->bindValue(':data',$data, PDO::PARAM_STR);
            $prepare->bindValue(':status',$status, PDO::PARAM_STR);
            $prepare->bindValue('novaimagem',$novaimagem,PDO::PARAM_STR);
            $prepare->bindValue(':id',$id, PDO::PARAM_STR);
            return $prepare->execute();
        /*if (isset($_POST["cadastro"])) {

		$nome_item=($_POST["nome"]);
		$nome_pessoa=($_POST["nome_pessoa"]);
		$local=($_POST["local"]);
		$descricao=($_POST["descricao"]);
		$data=date("Y-m-d h:i:s");
		$imagem=($_POST["imagem"]);
		
		$status=0;
		$id=($_COOKIE["id"]);
		$insert = "INSERT INTO intens(nome_item,nome_pessoa,local_encontrado,descricao,data_encontrado,status,id_usuarios) VALUES(:nome_item,:nome_pessoa,:localenc,:descricao,:data,:status,:id)";
		$prepare = DB::prepare($insert);
		$prepare->bindValue(':nome_item',$nome_item, PDO::PARAM_STR);
		$prepare->bindValue(':nome_pessoa',$nome_pessoa, PDO::PARAM_STR);
		$prepare->bindValue(':localenc',$local, PDO::PARAM_STR);
		$prepare->bindValue(':descricao',$descricao, PDO::PARAM_STR);
		$prepare->bindValue(':data',$data, PDO::PARAM_STR);
		$prepare->bindValue(':status',$status, PDO::PARAM_STR);
		$prepare->bindValue('novaimagem',$novaimagem,PDO::PARAM_STR);
		$prepare->bindValue(':id',$id, PDO::PARAM_STR);
		return $prepare->execute();
		}*/
      }
    }
 ?>