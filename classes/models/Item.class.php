<?php 
	include ($_SERVER['DOCUMENT_ROOT']."achados-e-perdidos/classes/Crud.php");
	 class Item extends Crud{

		//atualizas o iten
        public function update($id, $nome_item,$nome_pessoa,$local,$descricao,$data,$imagem,$status) {
          //$img = $imagem->image;
        //$novaimagem = null;
        if($imagem['acao'] == 0) {
                //Remover imagem da pasta
                
            $extensao=strtolower(substr($_FILES['userfile']['name'],-4));
            $novaimagem=(time()). $extensao;
            $diretorio="../upload/";
            
            move_uploaded_file($_FILES['userfile']['tmp_name'],$diretorio.
                $novaimagem);
            unlink($diretorio.$this->findItens($id)->imagem);
            }
            if($imagem['acao'] == 1){
                $novaimagem = $imagem['image'];

            }
            
        $sql ="UPDATE intens SET nome_item=:nome_item, nome_pessoa=:nome_pessoa, local_encontrado=:local, descricao=:descricao,data_encontrado=:data, imagem=:novaimagem, status=:status WHERE id=:id";

            $prepare =DB::prepare($sql);
            $prepare->bindValue(':nome_item',$nome_item, PDO::PARAM_STR);
            $prepare->bindValue(':nome_pessoa',$nome_pessoa, PDO::PARAM_STR);
            $prepare->bindValue(':local',$local, PDO::PARAM_STR);
            $prepare->bindValue(':descricao',$descricao, PDO::PARAM_STR);
            $prepare->bindValue(':data',$data, PDO::PARAM_STR);
            $prepare->bindValue(':novaimagem',$novaimagem,PDO::PARAM_STR);
            $prepare->bindValue(':status',$status, PDO::PARAM_STR);
            $prepare->bindValue(':id',$id, PDO::PARAM_INT);
            return $prepare->execute();  

        }

        //apaga o iten
        public function delete($id){
        	$delete="DELETE FROM intens WHERE id=:id";
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
			$diretorio="../upload/";
			
			move_uploaded_file($_FILES['userfile']['tmp_name'],$diretorio.
				$novaimagem);

        }

        $insert = "INSERT INTO intens(nome_item,nome_pessoa,local_encontrado,descricao,data_encontrado,status,imagem,id_usuarios) VALUES(:nome_item,:nome_pessoa,:localenc,:descricao,:data,:status,:novaimagem,:id)";
            $prepare = DB::prepare($insert);
            $prepare->bindValue(':nome_item',$nome, PDO::PARAM_STR);
            $prepare->bindValue(':nome_pessoa',$nome_pessoa, PDO::PARAM_STR);
            $prepare->bindValue(':localenc',$local, PDO::PARAM_STR);
            $prepare->bindValue(':descricao',$descricao, PDO::PARAM_STR);
            $prepare->bindValue(':data',$data, PDO::PARAM_STR);
            $prepare->bindValue(':status',$status, PDO::PARAM_STR);
            $prepare->bindValue(':novaimagem',$novaimagem,PDO::PARAM_STR);
            $prepare->bindValue(':id',$_COOKIE["id"], PDO::PARAM_STR);
            return $prepare->execute();
            
            $idU="SELECT last_insert_id()";
                
            $sql="INSERT INTO intens_has_categorias(id_intens, id_categorias) VALUES(:item, :categoria)";
            
            $exc = DB::prepare($sql);
            $exc->bindValue(':item',$idU, PDO::PARAM_STR);
            $exc->bindValue(':categoria',$categoria, PDO::PARAM_STR);
            return $exc->execute();
            

        if ($sql= 1) {

            require_once("sucesso!");

        }else{
            require_once("falha!");

        }  
    } 
}
 ?>