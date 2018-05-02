<?php
include  $_SERVER['DOCUMENT_ROOT'].'/achados-e-perdidos/classes/Crud.php';
class Usuario extends Crud{
    protected $table = 'usuarios';
    #Atributos da classe
    private $nome, $email, $senha, $telefone, $tipo;


   
    public function insert($nome, $email, $senha, $telefone, $tipo){
        try{
            $sql = "INSERT INTO $this->table (nome, email, senha, telefone, tipo) VALUES (:nome, :email, :senha, :telefone, :tipo)";
            $prepare = DB::prepare($sql);
            $prepare->bindValue(':nome', $nome, PDO::PARAM_STR);
            $prepare->bindValue(':email', $email, PDO::PARAM_STR);
            $prepare->bindValue(':senha', $senha, PDO::PARAM_STR);
            $prepare->bindValue(':telefone', $telefone, PDO::PARAM_STR);
            $prepare->bindValue(':tipo', $tipo, PDO::PARAM_INT);
            return $prepare->execute();
        }catch (PDOException $e){
           return $e->getMessage();
        }
    }

    #este método é abstrato na classe pai, logo é forçada a implementação do mesmo na classe filho
    public function update($id, $nome, $email, $senha, $telefone, $tipo){
        $sql = "UPDATE $this->table SET nome = :nome, email = :email, senha = :senha, telefone = :telefone, tipo = :tipo WHERE id = :id ";
        $prepare = DB::prepare($sql);
        $prepare->bindValue(':nome', $nome, PDO::PARAM_STR);
        $prepare->bindValue(':email', $email, PDO::PARAM_STR);
        $prepare->bindValue(':senha', $senha, PDO::PARAM_STR);
        $prepare->bindValue(':telefone', $telefone, PDO::PARAM_STR);
        $prepare->bindValue(':tipo', $tipo, PDO::PARAM_INT);
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);
        return $prepare->execute();
    }

    #este método é abstrato na classe pai, logo é forçada a implementação do mesmo na classe filho
    public function delete($id){
        $slq = "DELETE FROM $this->table WHERE id = :id";
        $prepare = DB::prepare($slq);
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);
        return $prepare->execute();
    }

}