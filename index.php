<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/models/Item.class.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/achados-e-perdidos/classes/Crud.php";

        if (isset($_GET['action']) && $_GET['action'] =='delete'){
        $itens = new Item();
        $itens->delete($_GET['id']);
        }   

?>

<!doctype html>
<html lang="pt-br">

<?php 
  include "partials/head.php";
?>

<body >

<?php
   include "partials/header.php";
?>


<?php
  include "partials/modals.php"
?>


<!--    LISTAGEM DE ITEM     -->
    <section class="section-cards section-encontrados">
        <div class="row section-title">
            <div class="conteiner-title">
                <h1 class="title-larger">Itens  <span class="text-bold"> Perdidos</span> </h1>
            </div>
        </div>
    <div class="row">
        <?php

            
            $pagina = (!isset($_GET['pagina']))? 1 : $_GET['pagina'];


            $sqlExec = DB::prepare("SELECT * FROM intens");
            $sqlExec->execute();
            $result = $sqlExec->fetchAll();
            $exibir = 6;

            $total = ceil((count($result)/$exibir)) ;

            $inicioExibir = ($exibir*$pagina) - $exibir;


            $sqlExec1 = DB::prepare("SELECT * FROM intens limit $inicioExibir, $exibir");
            $sqlExec1->execute();
            $result1 = $sqlExec1->fetchAll();
            if($sqlExec->rowCount() > 0 ){
            
               foreach ($result1 as $row):
                    include "partials/cards_achados.php";

                endforeach;
         
        ?>
    </div>
        <?php 

        for($i = 1; $i <= $total; $i++ ){

            if($i == $pagina){
                echo '['.$i.']';
            }else{
            echo ' <a href="?pagina='.$i.'">['.$i.']</a> ';
            }
        }
    }
    ?>
    </section>
    <section class="section-cards section-resolvidos">
        <div class="row section-title">
            <div class="conteiner-title">
                <h1 class="title-larger"> <span class="text-bold">Casos </span>   Resolvidos</h1>
            </div>
        </div>
    <div class="row">
        <?php
           
           
            $pagina = (!isset($_GET['paginadev']))? 1 : $_GET['paginadev'];

            $sqlExec =  DB::prepare("SELECT * FROM intens WHERE status=1");
            $sqlExec->execute();
            $result = $sqlExec->fetchAll();
            $exibir = 6;

            $total = ceil((count($result)/$exibir)) ;

            $inicioExibir = ($exibir*$pagina) - $exibir;


            $sqlExec1 =  DB::prepare("SELECT * FROM intens WHERE status=1 limit $inicioExibir, $exibir");
            $sqlExec1->execute();
            $result1 = $sqlExec1->fetchAll();

            if($sqlExec->rowCount() > 0 ){
          
               foreach ($result1 as $row):
                    
                    include "partials/cards_achados.php";

                endforeach;
            ?>
    </div>
        <?php 

        for($i = 1; $i <= $total; $i++ ){

            if($i == $pagina){
                echo '['.$i.']';
            }else{
            echo ' <a href="?pagina='.$i.'">['.$i.']</a> ';
            }
        }
    }
    ?></section>
</body>
</html>