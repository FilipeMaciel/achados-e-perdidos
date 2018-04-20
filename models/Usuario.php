<?php

include ("../bd/Conexao.class.php");
public class Usuario{

    private $bd;


    public function __construct(){
        $bd = new Conexao();
    }

    public function find($id){
        $sql = "SELEC * FROM usuarios WHERE id = :id";
        $prepare = $bd->prepare($sql);
        $prepare->bindValue
    }
    public function insert($nome, $email, $senha, $telefon, $tipo ){

    }
    public function deleteUser($id){

    }
    public function update($id){

    }
    public function fetchAll(){

    }
}