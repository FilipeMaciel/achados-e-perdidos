<?php 

	include ($_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/Crud.php");


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
        $data,$status,$categoria){
        try {
        $banco = new PDO("mysql:host=localhost;dbname=achados", "root", "");
        
        $banco->beginTransaction();

        if (isset($imagem)) {

            $extensao=strtolower(substr($_FILES['userfile']['name'],-4));
            $novaimagem=md5(time()). $extensao;
            $diretorio="../upload/";
            
            move_uploaded_file($_FILES['userfile']['tmp_name'],$diretorio.
                $novaimagem);

        }

            $prepare=$banco->prepare("INSERT INTO intens(nome_item,nome_pessoa,local_encontrado,descricao,data_encontrado,status,imagem,id_usuarios) VALUES(:nome_item,:nome_pessoa,:localenc,:descricao,:data,:status,:novaimagem,:id)");
            $prepare->bindValue(':nome_item',$nome, PDO::PARAM_STR);
            $prepare->bindValue(':nome_pessoa',$nome_pessoa, PDO::PARAM_STR);
            $prepare->bindValue(':localenc',$local, PDO::PARAM_STR);
            $prepare->bindValue(':descricao',$descricao, PDO::PARAM_STR);
            $prepare->bindValue(':data',$data, PDO::PARAM_STR);
            $prepare->bindValue(':status',$status, PDO::PARAM_STR);
            $prepare->bindValue(':novaimagem',$novaimagem,PDO::PARAM_STR);
            $prepare->bindValue(':id',$_COOKIE["id"], PDO::PARAM_STR);

             $prepare->execute();
        
        if (!$prepare) {
            die('Error ao inserir!');
        }
        
        $IDultimo=$banco->lastInsertId();
        
        $sql=$banco->prepare("INSERT INTO intens_has_categorias(id_intens, id_categorias) VALUES(:item, :categoria)");
        $sql->bindValue(':item', $IDultimo, PDO::PARAM_STR);
        $sql->bindValue(':categoria',$categoria, PDO::PARAM_STR);
        $sql->execute();
            
        if (!$sql) {
            die('Erro ao inserir FK');
        }

        $banco->commit();
        }
        catch(PDOException $e) {
           echo $e->getMessage();
        }
    } 

    public function devolver($nome,$data,$email,$identificacao,$telefone,$id,$status){
        try{
            $banco = new PDO("mysql:host=localhost;dbname=achados", "root", "");

            $banco->beginTransaction();

            $prepare=$banco->prepare("INSERT INTO devolucao(nome,data_devolucao,email,identificacao,telefone,id_intens) VALUES (:nome,:data_devolucao,:email,:ident,:telefone,:id_intens)");
            $prepare->bindValue(':nome',$nome,PDO::PARAM_STR);
            $prepare->bindValue(':data_devolucao',$data,PDO::PARAM_STR);
            $prepare->bindValue(':email',$email,PDO::PARAM_STR);
            $prepare->bindValue(':ident',$identificacao,PDO::PARAM_STR);
            $prepare->bindValue(':telefone',$telefone,PDO::PARAM_STR);
            $prepare->bindValue(':id_intens',$id,PDO::PARAM_STR);
            $prepare->execute();
            if (!$prepare) {
                die('ERROR!'.$prepare);
            }

            $sql=$banco->prepare("UPDATE intens SET status=:status WHERE id=:id");
            $sql->bindValue(':id',$id,PDO::PARAM_STR);
            $sql->bindValue(':status',$status,PDO::PARAM_STR);
            $sql->execute();
            if (!$sql) {
                die('ERROR!'.$sql);
            }

            $banco->commit();

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

 ?>