<?php



class SistemaLogin {

    public function criarCookies($id, $email, $tipo){
        setcookie("id", $id, time()+3600);
		setcookie("email", $email, time()+3600);
		setcookie("tipo",$tipo, time()+3600);
    }
	public function excluirCookies($email,$id,$tipo){

        
        setcookie("id", $id, time()-3600,"/achados-e-perdidos");
        setcookie("email", $email, time()-3600,"/achados-e-perdidos");
        setcookie("tipo",$tipo, time()-3600,"/achados-e-perdidos");
        header("Location: ../index.php");
	}
	
}
 ?>