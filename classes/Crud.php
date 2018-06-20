<?php

require_once 'DB.php';

abstract class Crud extends DB{

    protected $table;

    abstract public function delete($id);

    /*****
     *
     * Como estes métodos abaixo não precisam de dados específicos, eles podem ser generalizados para
     * todas as classes que desejarem realizar o crud de informações
     *
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
     public static function findItens($id){
        $sql = "SELECT * FROM intens WHERE id = :id";
        $prepare = DB::prepare($sql);
        $prepare->bindValue(':id', $id, PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->fetch();
    }
    public static function findAllItens(){
        $sql = "SELECT * FROM intens WHERE status=:status";
        $prepare = DB::prepare($sql);
        $prepare->bindValue(':status',0,PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->fetchAll();
    }
    public static function allItens(){
        $sql = "SELECT * FROM intens where id=1 ";
        $prepare = DB::prepare($sql);
        $prepare->execute();
        return $prepare->rowCount(); 
    }
    public static function limitItens($i,$f){
        $sqlExec1 = "SELECT * FROM intens limit :inicio, :exibir";
        $prepare = DB::prepare($sqlExec1);
        $prepare->bindValue(':inicio', $i, PDO::PARAM_STR);
        $prepare->bindValue(':exibir', $f, PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->fetchAll();
    }
    public static function findAllItensC(){
        $sql = "SELECT * FROM intens ";
        $prepare = DB::prepare($sql);
        $prepare->execute();
        return $prepare->fetchAll();
    }
    public static function findCategoria($id){
        $sql = "SELECT * FROM categorias WHERE id = :id";
        $prepare = DB::prepare($sql);
        $prepare->bindValue(':id', $id, PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->fetch();
    }
    public static function findAllCategoria(){
        $sql = "SELECT * FROM categorias";
        $prepare = DB::prepare($sql);
        $prepare->execute();
        return $prepare->fetchAll();
    }
    public static function findAllDevolucao(){
        $sql = "SELECT * FROM intens WHERE status = :status";
        $prepare = DB::prepare($sql);
        $prepare->bindValue(':status', 1, PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->fetchAll();
    }
    public static function findAllFiltro($categoria){
        $sql = "SELECT * FROM intens_has_categorias WHERE categoria = :categoria";
        $prepare = DB::prepare($sql);
        $prepare->bindValue(':categoria', $categoria, PDO::PARAM_STR);
        $prepare->execute();
        return $prepare->fetchAll();
    }
 
}