<?php

require_once 'DB.php';

abstract class Crud extends DB{

    protected $table;

    abstract  public function insert();
    abstract public function update($id);

    public function find($id){
        $sql = "SELECT * FROM table WHERE id = :id";
        $prepare = DB::prepare($sql);
        $prepare->bindValue(':id', $id, PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->fetch();
    }
    public function findAll(){
        $sql = "SELECT * FROM usuarios";
        $prepare = DB::prepare($sql);
        $prepare->execute();
        return $prepare->fetchAll();
    }
    public function delete($id){
        $slq = "DELETE FROM $this->table WHERE id = :id";
        $prepare = DB::prepare($slq);
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);
        return $prepare->execute();
    }

}