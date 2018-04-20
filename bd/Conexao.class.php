<?php

class Conexao extends PDO{
    private $host = 'mysql:dbname=achados;host=localhost';
    private $user = 'root';
    private $senha = '';
    public $db = null;

    /**
     * Conexao constructor.
     * esta classe se torna uma extensão da classe PDO, para que o construtor retorne o objeto PDO e nao ela mesma
     * pois observa-se que o objeto $con está recebendo o construtor da classe PDO e retornando seu valor para o
     * objeto $db que é a variavel que será instanciada para a conexão.
     */

   function __construct(){
       try{
           if($this->db == null){
               $con = parent::__construct($this->host, $this->user, $this->senha);
               $this->db = $con;
               return $this->db;
           }
       }catch (PDOException $e){
           echo 'Falha na Conexão: '.$e->getMessage();
           return false;
       }
       //parent::__construct($dsn, $username, $passwd, $options);
   }

  /* function __destruct()
   {
       // TODO: Implement __destruct() method.
       $this->db = null;
   }
}*/
}
?>