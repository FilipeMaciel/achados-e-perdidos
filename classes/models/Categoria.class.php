<?php
	include ($_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/Crud.php");
	
	class Categoria extends Crud{

		public function insert($nome){

			$insert="INSERT INTO categorias(nome) VALUES (:nome)";

			$prepare=DB::prepare($insert);
			$prepare->bindValue(':nome',$nome,PDO::PARAM_STR);
				return $prepare->execute();
		}
		public function update($nome){

			$update="UPDATE categorias SET nome=:nome";

			$prepare=DB::prepare($update);
			$prepare->bindValue(':nome',$nome,PDO::PARAM_STR);
				return $prepare->execute();
		}
		public function delete($id){
			$delete="DELETE FROM categorias WHERE id=:id";
			
			$prepare=DB::prepare($delete);
			$prepare->bindValue(':id',$id,PDO::PARAM_STR);
				return $prepare->execute();
		}
	}
?>