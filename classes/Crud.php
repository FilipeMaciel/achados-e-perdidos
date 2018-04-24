<?php

require_once 'DB.php';

abstract class Crud extends DB{

    protected $table;

    abstract  public function insert();
    abstract public function update($id);
    abstract public function delete($id);

    /*****  Como estes métodos abaixo não precisam de dados específicos, eles podem ser generalizados para
     * todas as classes que desejarem realizar o crud de informações
     *******/
    public static function find($id){
        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $prepare = DB::prepare($sql);
        $prepare->bindValue(':id', $id, PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->fetch();
    }
    public static function findAll(){
        $sql = "SELECT * FROM usuarios";
        $prepare = DB::prepare($sql);
        $prepare->execute();
        return $prepare->fetchAll();
    }

}