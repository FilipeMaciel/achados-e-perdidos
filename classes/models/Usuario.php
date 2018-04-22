<?php
require_once 'Crud.php';
class Usuario extends Crud{
    protected $table = 'usuarios';
    #Atributos da classe
    private $nome, $email, $senha, $telefone, $tipo;

    public function __construct($nome, $email, $senha, $telefone, $tipo){
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->telefone = $telefone;
        $this->tipo = $tipo;
    }

    public function insert(){
        try{
            $sql = "INSERT INTO $this->table (nome, email, senha, telefone, tipo) VALUES (:nome, :email, :senha, :telefone, :tipo)";
            $prepare = DB::prepare($sql);
            $prepare->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $prepare->bindValue(':email', $this->email, PDO::PARAM_STR);
            $prepare->bindValue(':senha', $this->senha, PDO::PARAM_STR);
            $prepare->bindValue(':telefone', $this->telefone, PDO::PARAM_STR);
            $prepare->bindValue(':tipo', $this->tipo, PDO::PARAM_INT);
            return $prepare->execute();
        }catch (PDOException $e){
            $e->getMessage();
        }
    }
    public function update($id){
        $sql = "UPDATE $this->table SET nome = :nome, email = :email, senha = :senha, telefone = :telefone, tipo = :tipo WHERE id = :id ";
        $prepare = DB::prepare($sql);
        $prepare->bindValue(':nome', $this->nome, PDO::PARAM_STR);
        $prepare->bindValue(':email', $this->email, PDO::PARAM_STR);
        $prepare->bindValue(':senha', $this->senha, PDO::PARAM_STR);
        $prepare->bindValue(':telefone', $this->telefone, PDO::PARAM_STR);
        $prepare->bindValue(':tipo', $this->tipo, PDO::PARAM_INT);
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);
        return $prepare->execute();

    }

}