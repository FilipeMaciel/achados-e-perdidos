<?php
	include ($_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/Crud.php");
	
	class Categoria extends Crud{

		public function insert($nome){
			try{

				$insert="INSERT INTO categorias(nome) VALUES (:nome)";

				$prepare=DB::prepare($insert);
				$prepare->bindValue(':nome',$nome,PDO::PARAM_STR);
					return $prepare->execute();
			}catch(PDOException $e) {
	           header("Location: /error.php");
	        }
		}
		public function update($nome,$id){
			try{
				$update="UPDATE categorias SET nome=:nome WHERE id= :id";

				$prepare=DB::prepare($update);
				$prepare->bindValue(':nome',$nome,PDO::PARAM_STR);
				$prepare->bindValue(':id',$id,PDO::PARAM_STR);

					return $prepare->execute();

			}catch(PDOException $e) {
           		header("Location: /error.php");
        	}
			
		}
		public function delete($id){
			try{
				$delete="DELETE FROM categorias WHERE id=:id";
						
				$prepare=DB::prepare($delete);
				$prepare->bindValue(':id',$id,PDO::PARAM_STR);
					return $prepare->execute();
			}catch(PDOException $e) {
			   header("Location: /error.php");
			}
		}
	}
?>
