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

<body>

<?php
   include "partials/header.php";
?>


<?php
  include "partials/modals.php"
?>


<!--    LISTAGEM DE ITEM     -->
 <h3 style=" text-align: center;">ITENS PERDIDOS</h3>

<div class="row">
    <?php
        //if(isset($_COOKIE["id"])){
            $itens = Item::findAllItens();
            foreach ($itens as $row):
                
            include "partials/cards_achados.php";

    ?>

    <?php 
        
    endforeach;
         
    ?>
 </div>
 <h3 style=" text-align: center;">CASOS RESOLVIDOS</h3>
<div class="row">
    <?php
        //if(isset($_COOKIE["id"])){
            $dev = Item::findAllDevolucao();
            foreach ($dev as $row):
                
            include "partials/cards_achados.php";

    ?>

    <?php 
        
    endforeach;
         
    ?>
 </div>




</body>
</html>